DELETE FROM users WHERE username IN ('admin', 'staff');

INSERT INTO users (name, username, password, type)
VALUES
('admin', 'admin', '0192023a7bbd73250516f069df18b500', 1),
('staff', 'staff', 'de9bf5643eabf80f4a56fda3bbb84483', 2);
