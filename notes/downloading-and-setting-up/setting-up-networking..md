# Setting up networking

- With your favorite text editor application, open the ElasticSearch configuration file. `elasticsearch.yml`. It's
 location depends on your operating system, and the installation process.
- To customize the network preferences, you need to change some parameters in the configuration file, such as:

```
cluster.name: elasticsearch
node.name: node-1
network.host: 192.168.0.1
```

## How it works ...
- `cluster.name`: This sets up the name of the cluster. Only nodes with the same name can join together.
- `node.name`: It allows you to define a name of your node. You must always set up a name for your node if you need
 to monitor your server.
- `network.host`: Used to define the IP address of the machine used to bind the node.
