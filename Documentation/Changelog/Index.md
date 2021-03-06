Changelog
=========

3.0.0
-----
-   Initial TYPO3 8.7 LTS Support 

2.0.25
------

-   bugfix if extensions depend on templavoila
-   bugfix if cal isn't installed
-   bugfix autoloading in T3 >= 6.2
-   bugfix cal indexer in T3 7.6
-   bugfix page indexer
-   support rnbase domain models
-   support reindexing deleted elements recursively
-   new config for solr 6.2
-   new feature grouped search in solr
-   new feature charbrowser for solr
-   new indexer for gridelements
-   new indexer for news
-   refactor several code and tests

2.0.8
-----

-   bugfix for core selection in solr admin panel

2.0.7
-----

-   bemodule refactored to rnbase module runner
-   be module registration for TYPO3 6 and above refactored

2.0.6
-----

-   support for workspaces included (IMPORTANT: reindexing of all data is neccessary if you have workspaces)

2.0.5
-----

-   updates manual
-   escape single quotes in the search term upon display in the FE for Lucence, Solr and ElasticSearch filters to avoid XSS

2.0.4
-----

-   converted documentation to markdown

2.0.3
-----

-   make some methods in solr response processor protected for inheritance

2.0.2
-----

-   solr response processer class can be extended from now on
-   raw value added to facet object

2.0.1
-----

-   fieldsConversion needs TSFE for cObj

2.0.0
-----

-   added support for TYPO3 7.6
-   removed CLI Crawler. Please use the Scheduler Task for indexing instead
-   cleanup and refactoring
-   added dfs field for irfaq categories
-   Handling of deleted files on FAL Indexing added
-   added missing exclude option in flexform for some fields
-   add new sorting feature for dfs fields
-   bugfix in case a FAL file has no storage
-   use title of FAL entites from metadata
-   fix solr ping checks to be typesafe
-   new addModelsToIndex method do add rnbase models and ArrayObjects to indexing queue
-   numbers are now accepted in fieldnames for filtering

1.5.10
------

-   [BUGFIX] passed model in tx\_mksearch\_indexer\_Base::indexEnableColumns is not changed anymore

1.5.9
-----

-   [!!!][BUGFIX] sys\_files with special characters like umlauts in their filename are now indexed correctly with the FAL indexer. You need the reindex all sys\_file records!

1.5.6
-----

-   [TASK] added FieldConversion for tt\_news and tt\_content indexer
-   [TASK] buildFacetData fallback removed tx\_mksearch\_util\_FacetBuilder
-   [TASK] Support for stdWrap in FieldConversion (issue \_\`\#6\`: <https://github.com/DMKEBUSINESSGMBH/typo3-mksearch/issues/6>)
-   [TASK] use TS parsinf of rn\_base to support file includes etc. in indexer configuration (\_\`\#7\`: <https://github.com/DMKEBUSINESSGMBH/typo3-mksearch/issues/7>)
-   [TASK] Support tags for fq-parameters (\_\`\#8\`: <https://github.com/DMKEBUSINESSGMBH/typo3-mksearch/issues/8>)
-   [TASK] rendering suggestions (\_\`\#9\`: <https://github.com/DMKEBUSINESSGMBH/typo3-mksearch/issues/9>)
-   [TASK] support for query facets added (\_\`\#10\`: <https://github.com/DMKEBUSINESSGMBH/typo3-mksearch/issues/10>)
-   [TASK] solr filter method parseFieldAndValue moved to filter util
-   [TASK] added documentation for the use of Tika to index PDFs etc.
-   some code cleanup and bugfixes

1.5.0
-----

-   [FEATURE] \#4 support for query facets
-   [FEATURE] Predefined form field for sorting search results in solr
-   [FEATURE] Indexer configuration: It is possible to index database fields (commaseparated) into more several document attributes
-   [FEATURE] Predefined form field to limit page size for solr
-   [FEATURE] Indexer configuration: It is possible to autoconvert unix timestamps to ISO dates with fieldsConversion.attributename.unix2isodate=1
-   check the manual, the example templates and static/static\_extension\_template/setup.txt for the new features

1.4.34
------

-   [TASK] typecast to int for preferer option, instead of bool cast

1.4.32
------

-   [TASK] optimize index on commit with service method from interface.
-   [TASK] new getPreparedIndexDocMockByRecord method for phpunit tests

1.4.31
------

-   [CLEANUP] abort message changed for ttnewss indexer

1.4.28
------

-   [BUGFIX] modelToIndex property now protected instead of private

1.4.25
------

-   [BUGFIX] solr search cache key fixed. (generateCacheKey walks recursiveley over field and options now)

1.4.24
------

-   [TASK] fallback to page title for emty content headers when indexing tt\_content
-   [TASK] content anchor for search entries to the url
-   [TASK] new dfs field for news categories of tt\_news
-   [TASK] pid in getPageContent has to be an integer and greather than 0.
-   [CLEANUP] title parsing outsourced to own method

1.4.23
------

-   [TASK] compatibility of mksearch with cal 1.9.0

