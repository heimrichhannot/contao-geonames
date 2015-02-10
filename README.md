# Geonames

A contao helper module for developers, where postal code data with the following additional informations can be imported into contao:

- country code      : iso country code, 2 characters
- postal code       : varchar(20)
- place name        : varchar(180)
- admin name1       : 1. order subdivision (state) varchar(100)
- admin code1       : 1. order subdivision (state) varchar(20)
- admin name2       : 2. order subdivision (county/province) varchar(100)
- admin code2       : 2. order subdivision (county/province) varchar(20)
- admin name3       : 3. order subdivision (community) varchar(100)
- admin code3       : 3. order subdivision (community) varchar(20)
- latitude          : estimated latitude (wgs84)
- longitude         : estimated longitude (wgs84)
- accuracy          : accuracy of lat/lng from 1=estimated to 6=centroid

## Import

Download the corresponding File from http://download.geonames.org/export/zip/ and use the importer unter "System -> GeoNames".

Caution: The GeoNames Postal Code files are licensed under a Creative Commons Attribution 3.0 License. 
This means you can use the dump as long as you give credit to geonames (a link on your website to www.geonames.org is ok)
see http://creativecommons.org/licenses/by/3.0/
UK: Contains Royal Mail data Royal Mail copyright and database right 2010.
The Data is provided "as is" without warranty or any representation of accuracy, timeliness or completeness.

For more informations visit: http://www.geonames.org/

## Features

- GeonamesPostalModel::findByCity() - find record by city

## Roadmap

- orbiting search (by postal)




