Election results May 7. 2016
===============================

Thought is to have a two pronged project:

* Precinct-level results from Travis and possibly Williamson County, based off of [March 2016 primary](http://projects.statesman.com/databases/election-results-20160507/).

But we also have to take into account this is a City of Austin election, so it has some williamson results, and therefore might be closer to the earlier [elex-maps](https://github.com/statesman/elex-maps) repo.

These directions are based on the March 2016 primary. I'll have to figure out how Williamson results play into this.

## Travis precincts

Get the file from [Travis county elections](elections@traviscoutytx.gov). I typically reach out to Ginny Ballard in advance and ask her to ftp it to ftp.statesman.com. Perhaps for the general we can get the races in advance?

Ginny Ballard CERA
Public Information Coordinator
Travis County Clerk – Elections Division
512-854-4177

### Processing
* The file comes as something like `20160301unconsolidatedtallyexportwithoversandunders.txt`
* I uploaded this into mysql and then ran a consolidation based on candidate, with `20160301_Travis` as my table name:

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

* I then exported that to `/results/travis.csv`
* I did a separate query to get the titles so I can build the files list for processing:

``` sql
SELECT DISTINCT
`20160507_Travis`.`Contest_title`
FROM
`20160507_Travis`
```


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

I then used regex on that to create `contest_selects_travis.txt`, which is formatted like this and later added to the html page of results:

``` html
<option data-zoom="-1" data-center="30.329632, -97.758797" value="p-d">PRESIDENT - DEM</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rd35-d">DISTRICT 35, UNITED STATES REPRESENTATIVE - DEM</option>

```

The regex search string:
```
^build_race_file\(\["(.*)"\], '(.*)'\)
```

The regex replace string:
```
<option data-zoom="-1" data-center="30.329632, -97.758797" value="\2">\1</option>
```

The `data-zoom` and `data-center` options there can be used to center the map for that race, which I did after everything else was done.

* Lastly, I put in a blank `williamson.csv` file with only headers so the next step wouldn't choke.

### Creating the JSON files

The script `races.py` walks through the `results/travis.csv` and and `results/williamson.csv` files to combine them. I took the contents of my `contest_titles_travis_py.csv` file and replaced what was at the bottom of `races.py` and then ran the python script. (It did fail first when I didn't have a `williamson.csv` file it expected.)

### Updating index.php

I had to sub in the `contest_selects_travis.txt` info into this file, rearranging it to make sense.
