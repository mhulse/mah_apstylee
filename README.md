## About:

This ExpressionEngine v2 plugin converts a timestamp into an Associated Press style formatted date and time.

Inspired by my co-worker and the [AP Style Dates and Times plugin for WordPress](http://www.rockmycar.net/2009/11/25/ap-style-plugin-updated/).

-----

## Associated Press style guidelines:

__Dates__

* Always use Arabic figures, without "st", "nd", "rd" or "th".
* Capitalize months.
* When a month is used with a specific date, abbreviate only "Jan.", "Feb.", "Aug.", "Sept.", "Oct.", "Nov." and "Dec.". Example: Oct. 4 was the day of her birthday.
* When a phrase lists only a month and year, do not separate the month and the year with commas. Example: February 1980 was his best month.
* When a phrase refers to a month, day and year, set off the year with commas. Example: Aug. 20, 1964, was the day they had all been waiting for.

__Time__

* Use figures except for "noon" and "midnight".
* Use a colon to separate hours from minutes. Example: 2:30 a.m.
* 4 o'clock is acceptable, but time listings with a.m. or p.m. are preferred.

-----

## Requirements:

* ExpressionEngine 2.0
* PHP 5.1.0 or greater

-----

## Required parameters:

* __"timestamp"__
    
    This parameter should, I say it SHOULD, work with many different timestamp formats. If not, lemme know! ;)

## Optional parameters:

Note: These parameter only work when the plugin is used as a single tag (i.e. the non-wrapping version of the plugin).

* __"return"__
    
    What bits of the date do you want returned? Valid choices are "timeonly", "dateonly", "time", "meridiem", "day", "month" and "year". Default is the full date and time.

* __"year"__
    
    Set to "yes" if you want the current year returned. Default is to not return the current year.

* __"today"__
    
    Set to the text you want to return if the day is today. Default is the day number.

* __"noon"__
    
    Set to the the text you want to return if the time is noon. Default is 12.

* __"midnight"__
    
    Set to the text you want to return if the time is midnight. Default is 12.

-----

## Usage example:

    Wrapping: 
    {exp:mah_apstylee timestamp="{entry_date}"}
    	{if ap_noon}Noon{if:elseif ap_midnight}Midnight{if:else}{if ap_time}{ap_time}{/if}{if ap_meridiem} {ap_meridiem}{/if}{/if}, {if ap_today}Today{if:else}{if ap_day}{ap_day}{/if}{/if} {if ap_month != ""}{ap_month}{/if}{if ap_not_year_now}{if ap_year != ""}, {ap_year}{/if}{/if}
    {/exp:mah_apstylee}
    Returns: Noon, Feb. 3

    Single, full meal deal: 
    {exp:mah_apstylee:single timestamp="{entry_date}" year="yes" today="Today" noon="Noon" midnight="Midnight"}
    Returns: Noon, Feb. 3, 2011

    Single, time only: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="timeonly"}
    Returns: 12 p.m.

    Single, date only: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="dateonly"}
    Returns: Feb. 3 

    Single, time: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="time"}
    Returns: 12

    Single, meridiem: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="meridiem"}
    Returns: p.m.

    Single, day: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="day"}
    Returns: 3

    Single, month: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="month"}
    Returns: Feb.

    Single, year: 
    {exp:mah_apstylee:single timestamp="{entry_date}" return="year"}
    Returns: 2011

-----

## Changelog:

Version 1.1
******************
2011/02/10: Fixed date logic for single tag.

Version 1.0
******************
2010/11/28: Initial public release.
