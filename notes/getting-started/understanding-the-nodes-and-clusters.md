## Understanding nodes and clusters
The base of the cloud nature of ES is:
- Every instance of ES is called a **node**. 
- Several nodes are grouped in a **cluster**.

**How it works.** One or more ES nodes can be set up on a physical, or a virtual server depending on the available
 resources such as RAM, CPU, and disk space.

**When a node is started**, several actions take place during its startup, such as:
- The configuration is read from the environment variables and the `elasticsearch.yml` configuration file.
- A node name is set by the configuration file, or is chosed from a list of built-in random names.
- Internally, the ES engine initializes all the modules and plugins.

**After the node startup**, the node searched for other cluster memebers and checks its index and shard status.

**To Join two or more nodes in a cluster**, the following rules must be observed:
- The version of ES must be the same.
- The cluster name must be the same.
- The network must be configured to support broadcast discovery.

**A common approach** in cluster management is to have:
- a **master node**, which is the main reference for all cluster-level actions,
- and *secondary nodes**, the replicated the master data and its actions.

**To be consistent** in the **write** operations, all the update actions are first commited in the master node and
 then replicated in the secondary nodes.
 
**In a cluster with multiple nodes**, if a **master node dies**, a **master-eligible** node is selected to be the new
 master node.
 
 **There are two important behaviours in ES node**:
 - The **non-data nodes** (_arbiters_): (Map/reduce)
    * are able to process **REST** responses and all other operations of search.
    * are responsible for distributing the actions to the underlying shards,
    * and collecting the shard results.
 - The **data nodes** are able to store data in them:
    * they contain the indices shards that store the indexed documents.
    
 **Using the standard configuration**, a node is both an arbiter and data container.
