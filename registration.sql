CREATE TABLE `users` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL PRIMARY KEY,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`) VALUES
('Mateus', 'Antunes', '1995-05-17', 'mateusoling', '123456');
