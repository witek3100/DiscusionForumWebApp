

CREATE TABLE `Blogposts` (
                             `tags` varchar(20) NOT NULL,
                             `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                             `content` varchar(500) NOT NULL,
                             `id` int NOT NULL
);

CREATE TABLE `Tags` (
                        `id` int NOT NULL,
                        `name` varchar(20) NOT NULL
);

CREATE TABLE `Users` (
                         `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                         `surname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                         `email` varchar(30) NOT NULL,
                         `id` int NOT NULL,
                         `password` varchar(30) NOT NULL
);

ALTER TABLE `Blogposts`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `Tags`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `Users`
    ADD PRIMARY KEY (`id`);
