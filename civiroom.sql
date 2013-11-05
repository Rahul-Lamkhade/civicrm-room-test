DROP TABLE IF EXISTS `civicrm_room`;

-- /*******************************************************
-- *
-- * civicrm_room
-- *
-- * A room entry.
-- *
-- *******************************************************/
CREATE TABLE `civicrm_room` (
     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Room ID.',
     `label` varchar(40) NOT NULL   COMMENT 'Room Label.',
     `room_no` varchar(40) NOT NULL   COMMENT 'Room Number.',
     `floor` varchar(40) NOT NULL   COMMENT 'Room Floor',
     `ext` varchar(40) NOT NULL   COMMENT 'Room Extension',

    PRIMARY KEY ( `id` )
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;