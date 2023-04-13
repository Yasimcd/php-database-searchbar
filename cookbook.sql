--
-- Database: 'cookbook'
--

-- ------------------------------------
-- Table structure for table 'category'
-- ------------------------------------
CREATE TABLE category (
  id INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY `name` (`name`) );

-- ------------------------------------
-- Dumping data for table 'category'
-- ------------------------------------
INSERT INTO category (
   name )
VALUES
   ('Beverage'),
   ('Dessert');


-- ------------------------------------
-- Table structure for table 'recipe'
-- ------------------------------------
CREATE TABLE recipe (
   id INT(11) NOT NULL AUTO_INCREMENT,
   `name` VARCHAR(50) DEFAULT NULL,
   content TEXT,
   creation TIMESTAMP NOT NULL DEFAULT NOW(),
   category_id INT(11) DEFAULT NULL,
   PRIMARY KEY (id) );

-- ------------------------------------
-- Dumping data for table 'recipe'
-- ------------------------------------
INSERT INTO recipe (
   name,
   content,
   category_id )
VALUES
   ('Jello',
    'Mix packet and cherries.',
     2 ),
   ('Pudding',
    'Mix ingredients',
     2 ),
   ('Koolaid',
    'Mix ingredients and cherry.',
     1 ),
   ('Hot Cocoa',
    'Mix Cocoa with water. Heat.',
     1 ),
   ('Chocolate Chips',
    'Add Chocolate chips to dough.',
     2 ),
   ('Cocoa Cake',
    'Add Cocoa to batter. Mix. Bake.',
     2 );