-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 06:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `furniture` (IN `rid` VARCHAR(255))  BEGIN
	DECLARE is_done integer default 0;
    DECLARE c_rid varchar(20);
    declare c_fno varchar(20);
    DECLARE c_ftype varchar(55);
    DECLARE c_furn CURSOR FOR SELECT furniture_type, furniture_id,Room_id FROM hostel_furniture WHERE Room_id = rid;
    DECLARE CONTINUE HANDLER FOR NOT found SET is_done = 1;
    OPEN c_furn;
    getlist: LOOP
    	FETCH c_furn into c_ftype,c_fno,c_rid;
        IF is_done = 1 THEN 
        	LEAVE getlist;
        END if;
        SELECT c_ftype,c_fno,c_rid;
    END LOOP;
    CLOSE c_furn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mess` (IN `sal` INT(100) UNSIGNED)  BEGIN 
declare name,bno varchar(255); 
declare cur1 cursor for select memp_name,Build_no from mess_entry where salary = sal;
open cur1;
fetch cur1 into name,bno; 
select name,bno; 
close cur1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rooms` (IN `bno` VARCHAR(255))  BEGIN
	declare is_done integer default 0;
	DECLARE c_rid varchar(20);
    DECLARE c_bno varchar(20);
    DECLARE c_fno varchar(20);
    DECLARE c_cap int;
    DECLARE c_room CURSOR FOR SELECT Room_id,Furniture_id,Capacity,Build_no FROM room_ent WHERE Build_no = bno;
    declare continue handler for not found set is_done = 1;
    OPEN c_room;
    getlist: LOOP
    	FETCH c_room into c_rid,c_fno,c_cap,c_bno;
        if is_done = 1 THEN
			leave getlist;
		end if;
        SELECT c_rid,c_fno,c_cap,c_bno;
    END LOOP getlist;
    CLOSE c_room;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `visitor` (IN `s_id` VARCHAR(255))  BEGIN
	DECLARE is_done integer DEFAULT 0;
    DECLARE c_sid varchar(20);
    DECLARE c_sname varchar(55);
    DECLARE c_vname varchar(55);
    DECLARE c_vdate date;    
    DECLARE c_vis CURSOR FOR SELECT v_name,s_name,sid,v_date FROM visitor WHERE sid = s_id;
    DECLARE CONTINUE HANDLER FOR NOT found SET is_done = 1;
    OPEN c_vis;
    getlist: LOOP
    	FETCH c_vis into c_vname,c_sname,c_sid,c_vdate;
        IF is_done = 1 THEN
        	leave getlist;
        END IF;
        SELECT c_vname,c_sname,c_sid,c_vdate;
   	END loop getlist;
  	CLOSE c_vis;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `Build_no` varchar(10) NOT NULL,
  `No_of_rooms` int(20) NOT NULL,
  `No_of_student` int(20) NOT NULL,
  `Annual_expense` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`Build_no`, `No_of_rooms`, `No_of_student`, `Annual_expense`) VALUES
('CEG01', 30, 80, 200000),
('CEG02', 40, 90, 500000),
('CEG03', 35, 90, 500000),
('CEG04', 45, 120, 900000),
('CEG05', 25, 70, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_furniture`
--

CREATE TABLE `hostel_furniture` (
  `furniture_type` varchar(55) NOT NULL,
  `furniture_id` varchar(20) NOT NULL,
  `Room_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_furniture`
--

INSERT INTO `hostel_furniture` (`furniture_type`, `furniture_id`, `Room_id`) VALUES
('Bed', 'B01', 'R01'),
('chair', 'B02', 'R02'),
('table', 'B03', 'R03'),
('BED', 'B04', 'R04'),
('stand', 'B05', 'R02');

-- --------------------------------------------------------

--
-- Table structure for table `mess_entry`
--

CREATE TABLE `mess_entry` (
  `memp_name` text NOT NULL,
  `memp_id` varchar(50) NOT NULL,
  `ph_no` int(15) NOT NULL,
  `DOB` date NOT NULL,
  `salary` int(10) NOT NULL,
  `Build_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_entry`
--

INSERT INTO `mess_entry` (`memp_name`, `memp_id`, `ph_no`, `DOB`, `salary`, `Build_no`) VALUES
('Damon Salvatore', 'E01', 8956214, '1990-09-10', 30000, 'CEG01'),
('Stefan Salvatore', 'E02', 6663332, '1885-10-03', 25000, 'CEG02'),
('Rebekah Mikaelson', 'E03', 8829123, '1985-05-04', 35000, 'CEG03'),
('Klaus Mikaelson', 'E04', 8829500, '1985-03-02', 35000, 'CEG03');

--
-- Triggers `mess_entry`
--
DELIMITER $$
CREATE TRIGGER `mess_tri_delete` AFTER DELETE ON `mess_entry` FOR EACH ROW BEGIN 
DELETE FROM trigger_mess WHERE memp_id = old.memp_id; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mess_tri_update` BEFORE UPDATE ON `mess_entry` FOR EACH ROW BEGIN 
UPDATE trigger_mess SET memp_name = NEW.memp_name, memp_id = NEW.memp_id, ph_no = NEW.ph_no, DOB = NEW.DOB, salary = NEW.salary, Build_no = NEW.Build_no WHERE memp_id = old.memp_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mess_trigger` AFTER INSERT ON `mess_entry` FOR EACH ROW BEGIN
INSERT INTO trigger_mess VALUES(
    NEW.memp_name,
    NEW.memp_id,
    NEW.ph_no,
    NEW.DOB,
    NEW.salary,
    NEW.Build_no
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_ent`
--

CREATE TABLE `room_ent` (
  `Room_id` varchar(20) NOT NULL,
  `Furniture_id` varchar(55) NOT NULL,
  `Capacity` int(5) NOT NULL,
  `Build_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_ent`
--

INSERT INTO `room_ent` (`Room_id`, `Furniture_id`, `Capacity`, `Build_no`) VALUES
('R01', 'B01', 2, 'CEG01'),
('R02', 'B02', 3, 'CEG01'),
('R03', 'B04', 1, 'CEG04'),
('R04', 'B03', 1, 'CEG02'),
('R05', 'B02', 1, 'CEG03'),
('R06', 'B01', 3, 'CEG04');

-- --------------------------------------------------------

--
-- Table structure for table `student_entry`
--

CREATE TABLE `student_entry` (
  `s_name` text NOT NULL,
  `sid` varchar(20) NOT NULL,
  `father_name` text NOT NULL,
  `department` text NOT NULL,
  `ph_no` int(20) NOT NULL,
  `gender` text NOT NULL,
  `age` int(5) NOT NULL,
  `DOB` date NOT NULL,
  `email` text NOT NULL,
  `Room_id` varchar(20) NOT NULL,
  `food_type` text NOT NULL,
  `Build_no` varchar(20) NOT NULL,
  `room_type` text NOT NULL,
  `fee` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_entry`
--

INSERT INTO `student_entry` (`s_name`, `sid`, `father_name`, `department`, `ph_no`, `gender`, `age`, `DOB`, `email`, `Room_id`, `food_type`, `Build_no`, `room_type`, `fee`) VALUES
('Aadharsh ', 'S01', 'Ramesh Ramanathan', 'CSE', 2147483647, 'Others', 19, '2001-10-10', 'senseiadhi333@gmail.com', 'R02', 'Veg', 'CEG01', 'Triple_Room', 4000),
('Bhuvi', 'S02', 'Suresh ', 'CSE', 11242421, 'Male', 19, '2001-04-05', 'bhuvan@gmail.com', 'R01', 'Veg', 'CEG01', 'Double_Room', 5500),
('jaswanth', 'S03', 'Ramanagiri Jainesh', 'CSE', 11241423, 'Male', 20, '2001-02-01', 'jashuthedon@gmail.com', 'R01', 'Non_Veg', 'CEG01', 'Double_Room', 6000),
('Raj kumar', 'S04', 'natarajan', 'MECH', 2147483647, 'Male', 21, '2001-02-02', 'camillo.moncelesan@me.com', 'R01', 'Non_Veg', 'CEG02', 'Triple_Room', 4500),
('Prithvi Rajan', 'S05', 'Vijay', 'ME', 6894782, 'Male', 21, '2000-02-03', 'camillo.moncelesan@me.com', 'R05', 'Non_Veg', 'CEG05', 'Single_Room', 4500),
('Raj kumar', 'S06', 'RAMANGIRI', 'MECH', 1234567, 'Male', 20, '2000-04-05', 'senseiadhi333@gmail.com', 'R01', 'Veg', 'CEG01', 'Triple_Room', 4000);

--
-- Triggers `student_entry`
--
DELIMITER $$
CREATE TRIGGER `student_entry_after` AFTER INSERT ON `student_entry` FOR EACH ROW BEGIN 
INSERT INTO student_entry_backup VALUES(
    NEW.s_name, 
    NEW.sid, 
    NEW.father_name, 
    NEW.department, 
    NEW.ph_no, 
    NEW.gender, 
    NEW.age, 
    NEW.DOB, 
    NEW.email, 
    NEW.Room_id, 
    NEW.food_type, 
    NEW.Build_no, 
    NEW.room_type, 
    NEW.fee
); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_entry_delete` BEFORE DELETE ON `student_entry` FOR EACH ROW BEGIN 
INSERT INTO student_entry_delete VALUES(
    old.s_name, 
    old.sid, 
    old.father_name, 
    old.department, 
    old.ph_no, 
    old.gender, 
    old.age, 
    old.DOB, 
    old.email, 
    old.Room_id, 
    old.food_type, 
    old.Build_no, 
    old.room_type, 
    old.fee
); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_entry_backup`
--

CREATE TABLE `student_entry_backup` (
  `s_name` text NOT NULL,
  `sid` varchar(20) NOT NULL,
  `father_name` text NOT NULL,
  `department` text NOT NULL,
  `ph_no` int(20) NOT NULL,
  `gender` text NOT NULL,
  `age` int(5) NOT NULL,
  `DOB` date NOT NULL,
  `email` text NOT NULL,
  `Room_id` varchar(20) NOT NULL,
  `food_type` text NOT NULL,
  `Build_no` varchar(20) NOT NULL,
  `room_type` text NOT NULL,
  `fee` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_entry_backup`
--

INSERT INTO `student_entry_backup` (`s_name`, `sid`, `father_name`, `department`, `ph_no`, `gender`, `age`, `DOB`, `email`, `Room_id`, `food_type`, `Build_no`, `room_type`, `fee`) VALUES
('Aadharsh ', 'S01', 'Ramesh Ramanathan', 'CSE', 2147483647, 'Male', 19, '2001-10-10', 'senseiadhi333@gmail.com', 'R01', 'Veg', 'CEG01', 'Triple_Room', 4000),
('Bhuvi', 'S02', 'Suresh ', 'CSE', 11242421, 'Male', 19, '2001-04-05', 'bhuvan@gmail.com', 'R01', 'Veg', 'CEG01', 'Double_Room', 5500),
('jaswanth', 'S03', 'Ramanagiri Jainesh', 'CSE', 11241423, 'Male', 20, '2001-02-01', 'jashuthedon@gmail.com', 'R01', 'Non_Veg', 'CEG01', 'Double_Room', 6000),
('Raj kumar', 'S04', 'natarajan', 'MECH', 2147483647, 'Male', 21, '2001-02-02', 'camillo.moncelesan@me.com', 'R01', 'Non_Veg', 'CEG02', 'Triple_Room', 4500),
('Prithvi Rajan', 'S05', 'Vijay', 'ME', 6894782, 'Male', 21, '2000-02-03', 'camillo.moncelesan@me.com', 'R05', 'Non_Veg', 'CEG05', 'Single_Room', 4500),
('Suresh', 'S06', 'natarajan', 'ECE', 2147483647, 'Male', 18, '2002-01-06', 'torns1970@gmail.com', 'R04', 'Veg', 'CEG04', 'Triple_Room', 4000),
('Aditya', 'S07', 'Giri', 'ECE', 259874, 'Male', 20, '2001-04-06', 'aditya@gmail.com', 'R05', 'Non_Veg', 'CEG04', 'Single_Room', 4500),
('Suresh', 'S07', 'natarajan', 'ECE', 2147483647, 'Others', 20, '2002-01-06', 'torns1970@gmail.com', 'R04', 'Veg', 'CEG04', 'Triple_Room', 4000),
('S06', 'Rahul', 'Dravid', 'BIO-TECH', 8956214, 'Male', 21, '2000-01-08', 'camillo.moncelesan@me.com', 'R04', 'Veg', 'CEG01', 'Triple_Room', 4000),
('Raj kumar', 'S06', 'RAMANGIRI', 'MECH', 1234567, 'Male', 20, '2000-04-05', 'senseiadhi333@gmail.com', 'R01', 'Veg', 'CEG01', 'Triple_Room', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `student_entry_delete`
--

CREATE TABLE `student_entry_delete` (
  `s_name` text NOT NULL,
  `sid` varchar(20) NOT NULL,
  `father_name` text NOT NULL,
  `department` text NOT NULL,
  `ph_no` int(20) NOT NULL,
  `gender` text NOT NULL,
  `age` int(5) NOT NULL,
  `DOB` date NOT NULL,
  `email` text NOT NULL,
  `Room_id` varchar(20) NOT NULL,
  `food_type` text NOT NULL,
  `Build_no` varchar(20) NOT NULL,
  `room_type` text NOT NULL,
  `fee` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_entry_delete`
--

INSERT INTO `student_entry_delete` (`s_name`, `sid`, `father_name`, `department`, `ph_no`, `gender`, `age`, `DOB`, `email`, `Room_id`, `food_type`, `Build_no`, `room_type`, `fee`) VALUES
('Aditya', 'S07', 'Giri', 'ECE', 259874, 'Male', 20, '2001-04-06', 'aditya@gmail.com', 'R05', 'Non_Veg', 'CEG04', 'Single_Room', 4500),
('Suresh', 'S07', 'natarajan', 'ECE', 2147483647, 'Others', 20, '2002-01-06', 'torns1970@gmail.com', 'R04', 'Veg', 'CEG04', 'Triple_Room', 4000),
('Suresh', 'S06', 'natarajan', 'ECE', 2147483647, 'Male', 18, '2002-01-06', 'torns1970@gmail.com', 'R04', 'Veg', 'CEG04', 'Triple_Room', 4000),
('S06', 'Rahul', 'Dravid', 'BIO-TECH', 8956214, 'Male', 21, '2000-01-08', 'camillo.moncelesan@me.com', 'R04', 'Veg', 'CEG01', 'Triple_Room', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `trigger_mess`
--

CREATE TABLE `trigger_mess` (
  `memp_name` text NOT NULL,
  `memp_id` varchar(50) NOT NULL,
  `ph_no` int(15) NOT NULL,
  `DOB` date NOT NULL,
  `salary` int(10) NOT NULL,
  `Build_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trigger_mess`
--

INSERT INTO `trigger_mess` (`memp_name`, `memp_id`, `ph_no`, `DOB`, `salary`, `Build_no`) VALUES
('Damon Salvatore', 'E01', 8956214, '1990-09-10', 30000, 'CEG01'),
('Stefan Salvatore', 'E02', 6663332, '1885-10-03', 25000, 'CEG02'),
('Rebekah Mikaelson', 'E03', 8829123, '1985-05-04', 35000, 'CEG03'),
('Klaus Mikaelson', 'E04', 8829500, '1985-03-02', 35000, 'CEG03');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `v_name` varchar(55) NOT NULL,
  `s_name` varchar(55) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `v_date` date NOT NULL,
  `time_in` time(6) NOT NULL,
  `time_out` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`v_name`, `s_name`, `sid`, `v_date`, `time_in`, `time_out`) VALUES
('Farook', 'Aadharsh', 'S01', '2021-05-04', '00:38:00.000000', '00:00:00.000000'),
('Kishore', 'Bhuvi', 'S02', '2021-05-10', '16:45:00.000000', '19:45:00.000000'),
('Abhishek', 'jaswanth', 'S03', '2021-05-05', '10:20:00.000000', '20:20:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`Build_no`);

--
-- Indexes for table `hostel_furniture`
--
ALTER TABLE `hostel_furniture`
  ADD PRIMARY KEY (`furniture_id`),
  ADD KEY `ROOM` (`Room_id`);

--
-- Indexes for table `mess_entry`
--
ALTER TABLE `mess_entry`
  ADD PRIMARY KEY (`memp_id`),
  ADD KEY `MBUILD_NO1` (`Build_no`);

--
-- Indexes for table `room_ent`
--
ALTER TABLE `room_ent`
  ADD PRIMARY KEY (`Room_id`),
  ADD KEY `BUILD1` (`Build_no`);

--
-- Indexes for table `student_entry`
--
ALTER TABLE `student_entry`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `Nuild_no` (`Build_no`),
  ADD KEY `ROOM_NO` (`Room_id`);

--
-- Indexes for table `student_entry_backup`
--
ALTER TABLE `student_entry_backup`
  ADD KEY `BUILDTB` (`Build_no`),
  ADD KEY `ROOM_NOTB` (`Room_id`);

--
-- Indexes for table `student_entry_delete`
--
ALTER TABLE `student_entry_delete`
  ADD KEY `MBUILD_NO` (`Build_no`),
  ADD KEY `ROOM_NOTD` (`Room_id`);

--
-- Indexes for table `trigger_mess`
--
ALTER TABLE `trigger_mess`
  ADD PRIMARY KEY (`memp_id`),
  ADD KEY `MBUILD_NO2` (`Build_no`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD KEY `STUDENT_ID` (`sid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hostel_furniture`
--
ALTER TABLE `hostel_furniture`
  ADD CONSTRAINT `ROOM` FOREIGN KEY (`Room_id`) REFERENCES `room_ent` (`Room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mess_entry`
--
ALTER TABLE `mess_entry`
  ADD CONSTRAINT `MBUILD_NO1` FOREIGN KEY (`Build_no`) REFERENCES `hostel` (`Build_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_ent`
--
ALTER TABLE `room_ent`
  ADD CONSTRAINT `BUILD1` FOREIGN KEY (`Build_no`) REFERENCES `hostel` (`Build_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_entry`
--
ALTER TABLE `student_entry`
  ADD CONSTRAINT `Nuild_no` FOREIGN KEY (`Build_no`) REFERENCES `hostel` (`Build_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ROOM_NO` FOREIGN KEY (`Room_id`) REFERENCES `room_ent` (`Room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_entry_backup`
--
ALTER TABLE `student_entry_backup`
  ADD CONSTRAINT `BUILDTB` FOREIGN KEY (`Build_no`) REFERENCES `hostel` (`Build_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ROOM_NOTB` FOREIGN KEY (`Room_id`) REFERENCES `room_ent` (`Room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_entry_delete`
--
ALTER TABLE `student_entry_delete`
  ADD CONSTRAINT `MBUILD_NO` FOREIGN KEY (`Build_no`) REFERENCES `hostel` (`Build_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ROOM_NOTD` FOREIGN KEY (`Room_id`) REFERENCES `room_ent` (`Room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trigger_mess`
--
ALTER TABLE `trigger_mess`
  ADD CONSTRAINT `MBUILD_NO2` FOREIGN KEY (`Build_no`) REFERENCES `hostel` (`Build_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `STUDENT_ID` FOREIGN KEY (`sid`) REFERENCES `student_entry` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
