# Managing your data
Our main data container is called **index** (plural **indices**) and it can be considered as a database in the
 traditional **SQL** world. In an index, the data is grouped into **data types** called **mappings** in ES. A mapping
  descrives how the records are composed (fields).
  
Every record that stored in ES must be a **JSON** object.

Natively, ES is a schema-less data store; when you enter records in it during the **insert** process, it processes
 the records, splits it into fields, and updates the schema to manage the inserted data.
 
To manage huge volumes of records, ES uses the common approach to **split an index into multiple shards** so that
 they can be spread on several nodes.
 
Every record is stored in only a shard; the sharding algorithm is based on a record ID, so many operations that
 require loading and changing of records, can be achieved without hitting all the shards, but only the shard(and its
  replica) that contains your object.
  
## Structure comparison:
| ElasticSearch | SQL | MongoDB |
| --- | --- | --- |
| Index | Database | Database |
| Shard | Shard | Shard |
| Mapping/Type | Table | Collection |
| Field | Field | Field |
| JSON Object | Record | BSON Object |


