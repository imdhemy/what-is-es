# Downloading and Installing ElasticSearch

The best practice is to use the latest available release (usually, the most stable release and with the least bugs).

## Requirements
- ES supported O.S (Linux, Mac OS X, Windows).
- JVM

## How to ...

1. Download ES from the web at [https://www.elastic.co/downloads/elasticsearch](https://www.elastic.co/downloads
/elasticsearch) .
2. Extract the binary content to a working directory, that is safe for charset problems and does not have a long path
 name.
3. Now, start the ElasticSearch executable to check whether everything is working.
4. Start the ElasticSearch server.

### Working directories
| Operating System | Suggested working directory |
| --- | --- |
| Windows | c:\es |
| Mac OS x | /opt/es |
| Unix | /opt/es |

### Starting the ES server
| Operating System | Command |
| --- | --- |
| Linux and Mac OS x | `bin/elasticsearch`
| Windows | `bin\elasticsearch.bat` |

## Package contents
The ES package generally contains three directories

| Directory | Description |
| --- | --- |
| bin | Contains the script to start and manage ES. `elasticsearch` and `plugin`|
| config | Contains the ES configurations, `elasticsearch.yml` and `logging.yml` |
| lib | Contains all the libraries required to run ES |

- [Official installation documentation](https://www.elastic.co/guide/en/elasticsearch/reference/current/setup.html)
- During the ES startup, there are a lot of events that occur:
    * A node name is chosen automatically, if it is not provided in the `elasticsearch.yml`.
    * A node name hash is generated for this node.
    * All plugins are loaded.
    * If not configured, ES binds to all the network addresses, using the ports:
        + port `9300` for internal intra-node communication.
        + port `9200` for the HTTP REST API.
- If the given port numbers are already bound, ES automatically increments the port number and tries to bind to them
 until a port is available (9201, 9202 and so on).
- After the startup, if indices are available, they are restored.
