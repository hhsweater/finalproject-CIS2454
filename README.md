# finalproject-CIS2454
Instructions

Please present on 4/30 6pm live in class or via zoom, or schedule a calendly appointment with me to present your final project anytime through May 4th.  I'll give a bonus point to anyone who presents live on 4/30

Please use an existing repository, or ask Eric to setup a new one for you if you'd like.  Submit the url of your repository and tell me what time you scheduled an appointment for as well.

You can work with a partner if you'd like, please let me know if you want a shared repository setup.

You must have at least 5 commits over 5 days showing incremental progress on the project, you can't commit the entire thing just before presenting and get points for it.

Projects that are not presented will not be scored.

you may NOT copy/paste someone else's work for this

You may use other sources and cite them as usual, but the bulk of the project needs to be your own work to receive credit.

You'll want to build it out piece by piece and add features incrementally.

Projects without the minimum number of commits will not receive a score.

Create a full stack shopping list application that allows for a user to Create, Read, Update, and Delete shopping lists for various stores.

Make a PHP backend that works with a database, sqlite, mysql, or mongodb, whichever you prefer.

Have GET endpoints for getting the list of stores, and the list of items from a store

Have POST endpoints for adding a new store or adding an item to a specific store's list

Have DELETE endpoints for deleting items or an entire store

Have a PUT endpoint for marking an item a checked or not

For example

 GET  /api/stores
 POST /api/stores             { name }
 DELETE /api/stores/{id}
 GET  /api/stores/{id}/items
 POST /api/stores/{id}/items { name, quantity }
 DELETE /api/items/{id}
 PUT /api/items/{id}          { checked, name, quantity }

Write a React frontend that allows the user to interact with the shopping list application

Add some css styling to make it look at least slightly nicer, the bootstrap style is pretty handy for stuff like that.

For a relational database, 2 simple tables should be sufficient, using auto generated primary keys to keep things simple, just a table for stores, and a table for items that references the store the item is from.

 CREATE TABLE stores (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL UNIQUE,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            );
            CREATE TABLE items (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                store_id INTEGER NOT NULL,
                name TEXT NOT NULL,
                quantity INTEGER DEFAULT 1,
                checked INTEGER DEFAULT 0,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (store_id) REFERENCES stores(id) ON DELETE CASCADE
            );
