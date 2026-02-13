DROP DATABASE IF EXISTS posse;

-- MySQLのデータベースを作成
CREATE DATABASE posse;

-- 作成したデータベースを選択
USE posse;

CREATE TABLE todos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT FALSE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO todos (title, completed, user_id) VALUES 
('チービル', false, 1),
('要件定義',false, 1),
('コーディング',false, 1),
('プレゼン準備',false, 1);

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES 
('山田太郎', 'yamada@example.com', 'password123'),