# Setting up a node
We'll see the most-used parameters in order to define where to store data and improve performance in general.

1. Open the `elasticsearch.yml` file.
2. Set up the directories that store your server data:
    - For Linux or Max OS X:
        * `path.conf`: `/opt/data/es/conf`
        * `path.data`: `/opt/data/es/data1`, `/opt2/data/data2`
        * `path.work`: `/opt/data/work`
        * `path.logs`: `/opt/data/logs`
        * `path.plugins`: `/opt/data/plugins`
    - For Windows:
         * `path.conf`: `c:\Elasticsearch\conf`
         * `path.data`: `c:\Elasticsearch\data`
         * `path.work`: `c:\Elasticsearch\work`
         * `path.logs`: `c:\Elasticsearch\logs`
         * `path.plugins`: `c:\Elasticsearch\plugins`
3. Set up parameters to control the standard index creation.
    * `index.number_of_shards: 5`
    * `index_number_of_replicas: 1`
    
> It's useful to set up the config directory outside your application directory, so you don't need to copy
> configuration files every time you update the version or change the ElasticSearch installation directory.

