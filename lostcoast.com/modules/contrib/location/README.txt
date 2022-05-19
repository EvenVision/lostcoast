CONTENTS OF THIS FILE
--------------------

* Introduction
* Requirements
* Installation
* Configuration
* Maintainers


INTRODUCTION
------------

The Location module allows real-world geographic locations to be associated with
Drupal nodes, including people, places, and other content. The Location module
allows admins to collect addresses, geocode them (translate addresses to
latitude/longitude), and associate locations with Drupal nodes and users.
Location data is automatically used to generate GeoRSS within your existing
RSS feeds.

* For a full description of the module visit
https://www.drupal.org/documentation/modules/location

* To submit bug reports and feature suggestions, or to track changes visit
https://www.drupal.org/project/issues/location


REQUIREMENTS
------------

This module has no required dependencies outside of Drupal core.


INSTALLATION
------------

* Install the Location module as you would normally install a contributed Drupal
module.
https://www.drupal.org/docs/7/extending-drupal-7/installing-contributed-modules-find-import-enable-configure-drupal-7
for further information.


CONFIGURATION
--------------

1. To configure the general location settings navigate to Administration >
Configuration > Content authoring > Location.

2. To configure map link settings navigate to Administration > Configuration >
Content authoring > Location > Map links. Map links are displayed with
locations and link to an external mapping website. When the link is clicked
the user is taken to the mapping website and the corresponding location is
loaded into it. Map link settings are per country.

3. To configure the geocoding settings navigate to Administration >
Configuration > Content authoring > Location > Geocoding options. Geocoding is
used to automatically calculate latitude/longitude coordinates based on a given
address. When geocoding is enabled a user can enter address details for a
location and then on saving the page the module tries to automatically populate
the latitude/longitude values using geocoding. Geocoding settings are per
country.

4. There is a Location Utilities page at Administration > Configuration >
Content authoring > Location > Location Utilities (admin/settings/location/util).
This page currently provides the ability to clear province and country list
caches if you modify the lists for your website.

5. User permissions can be configured by navigating to Administration >
People > Permissions.
* "View location directory" allows users to view the location_directory view,
which is a default view provided by the location module.
* "Submit latitude/longitude" allow users to add longitude and latitude values
while registering. The anonymous user role must have this permission.
* "View node location table" allows users to view the location_table view,
which is a default view provided by the location module.
* "View user location table" allows users to view the user_location_table view,
which is a default view provided by the location module.

To create mass geocoding/re-geocoding of node locations visit
https://www.drupal.org/node/1041632.


MAINTAINERS
-----------

* Dmitry Drozdik (ddrozdok) - https://www.drupal.org/u/ddrozdik
* Andrii Podananko (podarok) - https://www.drupal.org/u/podarok
* Alexander Schedrov (sanchiz) - https://www.drupal.org/u/sanchiz
* Brandon Bergren (bdragon) - https://www.drupal.org/u/bdragon

This project was supported by Druler - https://www.drupal.org/druler
