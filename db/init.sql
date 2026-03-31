CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20)
);

INSERT INTO users (username, password, role) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'admin'),
('user', '6ad14ba9986e3615423dfca256d04e3f', 'user');

CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    body TEXT,
    image VARCHAR(255)
);

INSERT INTO blogs (title, body, image) VALUES
('First Post', 'This is a test blog', 'test.jpg');
