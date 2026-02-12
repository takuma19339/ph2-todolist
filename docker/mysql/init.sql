DROP DATABASE IF EXISTS posse;

-- MySQLのデータベースを作成
CREATE DATABASE posse;

-- 作成したデータベースを選択
USE posse;

CREATE TABLE todos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT FALSE
);

INSERT INTO todos (title, completed) VALUES 
('チービル', false),
('要件定義',false),
('コーディング',false),
('プレゼン準備',false);