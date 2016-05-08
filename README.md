Election results May 7. 2016
===============================

This is for:

* Precinct-level results from Travis and possibly Williamson County, based off of [March 2016 primary](http://projects.statesman.com/databases/election-results-20160507/).

But this is also a City of Austin election, so it has some Williamson results, and therefore might be closer to the earlier [elex-maps](https://github.com/statesman/elex-maps) repo. The City of Austin Proposition 1 race (Uber/Lyft) included some Williamson precincts.

## Travis precincts

Get the file from [Travis county elections](elections@traviscoutytx.gov). I typically reach out to Ginny Ballard in advance and ask her to ftp it to ftp.statesman.com. Perhaps for the general we can get the races in advance?

Ginny Ballard CERA
Public Information Coordinator
Travis County Clerk – Elections Division
512-854-4177

They were nice enough to supply a zeros file in advance so setup coudl be done in advance.

### Processing results

* The file comes as something like `20160507unconsolidatedtallyexportwithoversandunders.txt`
* I uploaded this into mysql and then ran a consolidation based on candidate, with `20160507_Travis` as my table name:

``` sql
SELECT
    `20160507_Travis`.`Precinct_name`,
    `20160507_Travis`.`Contest_title`,
    `20160507_Travis`.`candidate_name`,
    `20160507_Travis`.`Party_Code`,
    sum(`20160507_Travis`.`total_votes`)
FROM
    `20160507_Travis`
GROUP BY
    1,2,3,4
```

* I then exported that to `/results/travis.csv`, making sure that two things were selected:
    - Include column titles
    - Text qualifier as doublequotes. (There were problems if this is left out)
* For 20160507 I took the Travis records that started with precinct_name starting with "W" and moved them into the `williamson.csv` file, and kept the header file. I also S&R out the W from the precinct name, which is needed for processing. The `races.py` adds it back.
* OF NOTE: If there are no Williamson county restuls at all, you have to keep that `williamson.csv` file with header or the `races.py` script will fail. Williams Elecitons just takes a long time ot get precinct-level results to us.
* OF NOTE: in 20160507 there was a race name that had `Contest_title` that included escaped characters as ""No"" and that records failed to build in the races script. I had to change that to single quotes in the `races.py` file for it to work.

### Contest titles

* I did a separate query to get the titles so I can build the files list for processing:
sd

``` sql
SELECT DISTINCT
`20160507_Travis`.`Contest_title`
FROM
`20160507_Travis`
```

#### Titles for `races.py`
* I then took each line of that file and started creating the python array in a file called `contest_titles_travis_py.csv`. It looks something like this:

``` python
build_race_file(["PRESIDENT - DEM"], 'p-d')
build_race_file(["DISTRICT 35, UNITED STATES REPRESENTATIVE - DEM"], 'rd35-d')
```

Regex find:
```
^(".*")
```

Regex replace:
```
build_race_file([\1], 'uniqueID')
```

I had to replace `uniqueID` with something unique to each race that I decided myself. It is used to match the JSON file, and for the dropdown in the map (contest_selects below).

This list of races goes at the bottom of the `races.py` file.

#### Titles for `index.php` races dropdown

I used `contest_titles_travis_py.csv` and regex to create `contest_selects_travis.txt`, which is formatted like this and later added to the html page of results:

``` html
<option data-zoom="-1" data-center="30.329632, -97.758797" value="p-d">PRESIDENT - DEM</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rd35-d">DISTRICT 35, UNITED STATES REPRESENTATIVE - DEM</option>

```

This ends up being in the `select` form attribute in `index.php`.

The regex search string:
```
^build_race_file\(\["(.*)"\], '(.*)'\)
```

The regex replace string:
```
<option data-zoom="-1" data-center="30.329632, -97.758797" value="\2">\1</option>
```

The `data-zoom` and `data-center` options there can be used to center the map for that race, which I did after everything else was done.


### Creating the JSON files usings `races.py`

Need to start into virutal env:
``` bash
source venv/bin/activate
pip install -r requirements.txt
```

The script `races.py` walks through the `results/travis.csv` and `results/williamson.csv` files to connect to the geojson file and then writes them into `race-data/` as their `uniqueid.json`.

(If there are no williamson results and that file `williamson.csv` is empty, it will fail. Just put headers only in that file and it will be OK.

### Updating index.php

I had to sub in the `contest_selects_travis.txt` info into this file, rearranging it to make sense.
