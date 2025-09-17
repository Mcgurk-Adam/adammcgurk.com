CREATE TABLE recipes (
    id int NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    image_name varchar(255) NOT NULL,
    image_alt varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE recipe_tags (
    id int NOT NULL AUTO_INCREMENT,
    tag_name varchar(100) NOT NULL,
    recipe_id int NOT NULL,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE recipe_suggested_questions (
    id int NOT NULL AUTO_INCREMENT,
    question_value TEXT NOT NULL,
    recipe_id int NOT NULL,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE recipe_steps (
    id int NOT NULL AUTO_INCREMENT,
    step_value TEXT NOT NULL,
    recipe_id int NOT NULL,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE recipe_ingredient_sections (
    id int NOT NULL AUTO_INCREMENT,
    section_name varchar(100) NOT NULL,
    recipe_id int NOT NULL,
    FOREIGN KEY (recipe_id) REFERENCES recipes(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE recipe_ingredients (
    id int NOT NULL AUTO_INCREMENT,
    ingredient_value varchar(255) NOT NULL,
    section_id int DEFAULT NULL,
    FOREIGN KEY (section_id) REFERENCES recipe_ingredient_sections(id) ON DELETE SET NULL,
    PRIMARY KEY (id)
);