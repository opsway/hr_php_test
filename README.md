HR PHP TEST
============

This is example application for data migration from any source data to any destination data.

Installation
------------

Just run composer install

Usage
------

* CLI mode
```
php main.php reader writer
```
* WEB mode
```
php -S localhost:8000
```
  Open browser on http://localhost:8000/main2.php?reader=ReaderName&writer=WriterName
  


HR TASKS
-------

1. Investigate application (ignore tests folder) and write short description (no more then 100 words: how works, which functional on each classes, etc) to data/comments/1.txt file. Commit this file.
2. Run main.php in CLI mode for export all products to console output writer. Please redirect (https://en.wikipedia.org/wiki/Redirection_(computing)#Basic) console output to file data/2.txt. Write your actions (commands) to data/comments/2.txt. Commit both files.
3. Run main.php in CLI mode for export all products to data/export.csv file. Fix bug in CSV writer. Commit export.csv file and fix to repo.
4. Run main2.php in WEB mode for export all products to HTML writer. Fix bug with output (extra top symbols). Create browser screenshot and save to data/3.jpg. Commit fix and screenshot to repo.
5. Remove ConsoleLogger from main.php and implement same functionality with anonymous function / closure. Commit changes.
6. Write new Csv Reader which should parse export.csv from 3 task. And write new Logger in Csv file which will put in csv only rows with qty = 0 & is_stock = 0. Commit new changes and result log csv file to /data/output.log.csv

1-5 tasks is required. 
6 - advanced level (affect the level of salary).
Each commit need push to GitHub after commit and with number task in comment.