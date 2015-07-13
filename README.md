OpsWay PHP TEST for Senior Developer level
============

This is example application for data migration from any source data to any destination data.

Attention, this test is created deliberately complex to reflect real-world complexities that are met in day-to-day work

You have 24 hours to complete the test, but pay attention that time spent affects your overall score:

You'll get 3 points if test is done <=3 hours, 2 point <=6 hours, 1 point it done <24 hours.  

Installation
------------

 
```
composer install
```

Usage
------

* CLI mode
```
php main.php {reader} {writer}
```
* WEB mode
```
php -S localhost:8000
```
  Open browser on http://localhost:8000/web.php?reader=ReaderName&writer=WriterName
  


Task description 
-------

**Important!** All comment in commits should contained task number (cast sensitive) : "TASK 2", "TASK 3", etc

1. Investigate application (ignore /tests folder) and write short description (no more than 100 words: how it works for every class you meet in functional on each classes, etc) to data/comments/1.txt file. Commit this file.

2. Run main.php in CLI mode for export all products to console output writer. 
Redirect using redirect operator (https://en.wikipedia.org/wiki/Redirection_(computing)#Basic) console output to file data/2.txt. 
Put the commands you used to data/comments/2.txt. Commit both files.

3. Run main.php in CLI mode for export all products to data/export.csv file. 
Fix bug in CSV writer. Commit export.csv file and fix to repo.

4. Run web.php in WEB mode for export all products to HTML writer. 
Fix bug with output (remove extra top symbols). 
Take a screenshot with result table and save to data/3.jpg. 
Commit fix and screenshot to repo.

5. Remove instantiation of ConsoleLogger class from main.php and implement same functionality with anonymous function / closure. 
Commit changes.

6. Write new CSV reader class which should parse export.csv created as a result of Task 3. 
Write new OutOfStockLogger class that will log in CSV format rows that have only qty == 0 & is_stock == 0
Run main.php in CLI mode and use created CSV reader and output data to console
Commit code changes and include result log csv file as /data/output.log.csv
