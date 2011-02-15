## About:

This ExpressionEngine v2 plugin converts a timestamp into an Associated Press style formatted date and time.

Inspired by my co-worker and the [AP Style Dates and Times plugin for WordPress](http://www.rockmycar.net/2009/11/25/ap-style-plugin-updated/).

-----

## Associated Press style guidelines:

__DATES:__

> Always use Arabic figures, without st, nd, rd or th. *See months for examples and punctuation guidelines.*

__MONTHS:__

> Capitalize the names of months in all uses. When a month is used with a specific date, abbreviate only Jan., Feb., Aug., Sept., Oct., Nov. and Dec. Spell out when using alone, or with a year alone.
> 
> When a phrase lists only a month and a year, do not separate the year with commas. When a phrase refers to a month, day and year, set off the year with commas.
> 
> Examples: January 1972 was a cold month. Jan. 2 was the coldest day of the month. His birthday is May 8. Feb. 14, 1987, was the target date.
> 
> In tabular material, use these three-letter forms without a period: Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec.
> 
> *See dates and years.*

__YEARS:__

> Use figures, without commas: 1995. Use an s without an apostrophe to indicate spans of decades or centuries: the 1890s, the 1800s.
> 
> Years are the lone exception to the general rule in numerals that a figure is not used to start a sentence: 1994 was a very good year.
> 
> *See A.D.; B.C.; centuries; historical periods and events; and months.*

__A.D.:__

> Acceptable in all references for anno Domini: in the year of the Lord.
> 
> Because the full phrase would read in the year of the Lord 96, the abbreviation A.D. goes before the figure for the year: A.D. 96.
> 
> Do not write: The fourth century A.D. The fourth century is sufficient. If A.D. is not specified with a year, the year is presumed to be A.D.
> 
> *See B.C.*

__B.C.:__

> Acceptable in all references to a calendar year in the period before Christ.
> 
> Because the full phrase would be in the year 43 before Christ, the abbreviation B.C. is placed after the figure for the year: 43 B.C.
> 
> Abbreviate the Canadian province, British Columbia, as B.C. when included with a city in stories or datelines; other provinces are spelled out.
> 
> *See A.D.*

__CENTURY:__

> Lowercase, spelling out numbers less than 10: the first century, the 20th century.
> 
> For proper names, follow the organization’s practice: 20th Century Fox, Twentieth Century Fund, Twentieth Century Limited.

__HISTORICAL PERIODS AND EVENTS:__

> Capitalize the names of widely recognized epochs in anthropology, archaeology, geology and history: the Bronze Age, the Dark Ages, the Middle Ages, the Pliocene Epoch.
> 
> Capitalize also widely recognized popular names for the periods and events: the Atomic Age, the Boston Tea Party, the Civil War, the Exodus (of the Israelites from Egypt), the Great Depression, Prohibition.
> 
> Lowercase century: the 18th century.
> 
> Capitalize only the proper nouns or adjectives in general descriptions of a period: ancient Greece, classical Rome, the Victorian era, the fall of Rome.
> 
> For additional guidance, see separate entries in this book for many epochs, events and historical periods. If this book has no entry, follow the capitalization in Webster’s New World Dictionary, using lowercase if the dictionary lists it as an acceptable form for the sense in which the word is used.

__TIMES:__

> Use figures except for noon and midnight. Use a colon to separate hours from minutes: 11 a.m., 1 p.m., 3:30 p.m.
> 
> Avoid such redundancies as 10 a.m. this morning, 10 p.m. tonight or 10 p.m. Monday night. Use 10 a.m. today, 10 p.m. today or 10 p.m. Monday, etc., as required by the norms in time element.
> 
> The construction 4 o'clock is acceptable, but time listings with a.m. or p.m. are preferred.
> 
> Always use the a.m. and p.m.: The meeting will last from 7 p.m. to 10 p.m. (not 7 to 10 p.m.)
> 
> *See midnight, noon and time zones.*

__MIDNIGHT:__

> Do not put a 12 in front of it. It is part of the day that is ending, not the one that is beginning.

__NOON:__

> Do not put a 12 in front of it. *See midnight and times.*

__TIME ZONES:__

> Capitalize the full name of the time in force within a particular zone: Eastern Standard Time, Eastern Daylight Time, Central Standard Time, etc.
> 
> Lowercase all but the region in short forms: the Eastern time zone, Pacific time, Mountain time, etc.
> 
> *See time of day for guidelines on when to use clock time in a story.*
> 
> Spell out time zone in references not accompanied by a clock reading: Chicago is in the Central time zone.
> 
> The abbreviations EST, CDT, etc., are acceptable on first reference for zones used within the continental United States, Canada and Mexico only if the abbreviation is linked with a clock reading: noon EST, 9 a.m. PST. (Do not set the abbreviations off with commas.)
> 
> Spell out all references to time zones not used within the continental United States: When it is noon EDT, it is 1 p.m. Atlantic Standard Time and 8 a.m. Alaska Standard Time.
> 
> One exception to the spelled-out form: Greenwich Mean Time may be abbreviated as GMT on second reference if used with a clock reading.
> 
> The World Almanac contains a time zone map.

__TIME OF DAY:__

> The exact time of day that an event has happened or will happen is not necessary in most stories. Follow these guidelines to determine when it should be included and in what form:
> 
> Specify the time:
> 
> * Whenever it gives the reader a better picture of the scene: Did the earthquake occur when people were likely to be home asleep or at work? A clock reading for the time in the datelined community is acceptable, although pre-dawn hours or rush hour often is more graphic.
> * Whenever the time is critical to the story: When will the rocket be launched? When will a major political address be broadcast? What is the deadline for meeting a demand?
> 
> Deciding on clock time: When giving a clock reading, use the time in the datelined community.
> 
> If the story is undated, use the clock time in force where the event happened or will take place.
> 
> Zone abbreviations: Use EST, CDT, PST, etc., after a clock time only if necessary to avoid confusion.
> 
> Convert to Pacific Time?: Do not convert clock times from other time zones in the continental United States to Pacific time. If there is high interest in the precise time, add CDT, EST, etc., to the local reading to help readers determine their equivalent local time.
> 
> If the time is critical in a story from outside the continental United States, provide a conversion to Pacific time using this form:
> 
> > The kidnappers set a 9 a.m. (3 a.m. PDT) deadline.
> 
> *See time zones for additional guidance on forms.*

*__Note:__ Cribbed from my work's style guide.*

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
    	{if ap_noon}Noon{if:elseif ap_midnight}Midnight{if:else}{if ap_time}{ap_time}{/if}{if ap_meridiem} {ap_meridiem}{/if}{/if}, {if ap_today}Today{if:else}{if ap_month != ""} {ap_month}{/if} {if ap_day}{ap_day}{/if}{if ap_not_year_now}{if ap_year != ""}, {ap_year}{/if}{/if}{/if}
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
2011/02/10: Fixed date logic for single tag. ;)

Version 1.0
******************
2010/11/28: Initial public release.
