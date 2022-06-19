CREATE TABLE IF NOT EXISTS film (
    `film_id` VARCHAR(3) CHARACTER SET utf8,
    `title` VARCHAR(100) CHARACTER SET utf8,
    `popular_rank` INT,
    `age` VARCHAR(20) CHARACTER SET utf8,
    `start_ear` INT,
    `end_year` INT,
    `episodes` INT,
    `film_type` VARCHAR(20) CHARACTER SET utf8,
    `country` VARCHAR(20) CHARACTER SET utf8,
    `language` VARCHAR(20) CHARACTER SET utf8,
    `summary` VARCHAR(2000) CHARACTER SET utf8,
    `rating` NUMERIC(2, 1),
    `genre` VARCHAR(20) CHARACTER SET utf8,
    `cast` VARCHAR(500) CHARACTER SET utf8,
    `image_url` VARCHAR(500) CHARACTER SET utf8
);