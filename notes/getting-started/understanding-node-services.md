# Understanding node services
When a node is running, a lot of services are managed by its instance. These services provide additional
 functionalities to a node and they cover different behaviors such as networking, indexing, analyzing, and so on.
 
 **During a node startup**, a lot of required services are automatically started. The most important are:
 - **Cluster services**:  These manage the cluster state, intra-node communication, and synchronization.
 - **Indexing service**: Manage all the indexing operations, initializing all active indices and shards.
 - **Mapping service**: This manages the document types stored in the cluster.
 - **Network services**: such as **HTTP REST** services(post 9200), internal ES protocol(port 9300), and the thrift
  server (port 9500).
 - **Plugin service**: enables us to enhance the basic ES functionality.
 - **River service**: it's a pluggable service sunning within ES cluster, pulling data that is then indexed into the
  cluster.
- **Language scripting services**: They allow you to add a new language scripting support to ES.

<p dir="rtl">Next: <a href="./managing-your-data.md">Managing your data</a></p>
