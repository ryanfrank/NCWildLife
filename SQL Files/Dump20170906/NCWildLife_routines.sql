-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: NCWildLife
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `schedule_assignment`
--

DROP TABLE IF EXISTS `schedule_assignment`;
/*!50001 DROP VIEW IF EXISTS `schedule_assignment`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `schedule_assignment` AS SELECT 
 1 AS `id`,
 1 AS `allDay`,
 1 AS `title`,
 1 AS `start`,
 1 AS `end`,
 1 AS `backgroundColor`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `county_view`
--

DROP TABLE IF EXISTS `county_view`;
/*!50001 DROP VIEW IF EXISTS `county_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `county_view` AS SELECT 
 1 AS `county_id`,
 1 AS `county_name`,
 1 AS `state_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `schedule_assignment_view`
--

DROP TABLE IF EXISTS `schedule_assignment_view`;
/*!50001 DROP VIEW IF EXISTS `schedule_assignment_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `schedule_assignment_view` AS SELECT 
 1 AS `rehabber_name`,
 1 AS `volunteer_schedule`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `feeding_charts_view`
--

DROP TABLE IF EXISTS `feeding_charts_view`;
/*!50001 DROP VIEW IF EXISTS `feeding_charts_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `feeding_charts_view` AS SELECT 
 1 AS `species_name`,
 1 AS `feeding_weight`,
 1 AS `feeding_cc`,
 1 AS `freequency`,
 1 AS `freequency_description`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `schedule_assignment`
--

/*!50001 DROP VIEW IF EXISTS `schedule_assignment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `schedule_assignment` AS select `volunteer_schedule`.`id` AS `id`,`volunteer_schedule`.`allDay` AS `allDay`,`volunteer_schedule`.`title` AS `title`,`volunteer_schedule`.`start` AS `start`,`volunteer_schedule`.`end` AS `end`,`volunteer_schedule`.`backgroundColor` AS `backgroundColor`,(select group_concat(`schedule_assignment_view`.`rehabber_name` separator ',') from `schedule_assignment_view` where (`schedule_assignment_view`.`volunteer_schedule` = `volunteer_schedule`.`id`)) AS `description` from (`volunteer_schedule` left join `schedule_assignment_view` on((`schedule_assignment_view`.`volunteer_schedule` = `volunteer_schedule`.`id`))) group by `volunteer_schedule`.`id` order by `volunteer_schedule`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `county_view`
--

/*!50001 DROP VIEW IF EXISTS `county_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `county_view` AS select `counties`.`county_id` AS `county_id`,`counties`.`county_name` AS `county_name`,`states`.`state_name` AS `state_name` from (`counties` join `states` on((`counties`.`county_state` = `states`.`state_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `schedule_assignment_view`
--

/*!50001 DROP VIEW IF EXISTS `schedule_assignment_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `schedule_assignment_view` AS select concat(`rehabber`.`rehabber_first_name`,' ',`rehabber`.`rehabber_last_name`) AS `rehabber_name`,`volunteer_assignment`.`volunteer_schedule` AS `volunteer_schedule` from (`volunteer_assignment` join `rehabber` on((`volunteer_assignment`.`volunteer` = `rehabber`.`rehabber_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `feeding_charts_view`
--

/*!50001 DROP VIEW IF EXISTS `feeding_charts_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `feeding_charts_view` AS select `species`.`species_name` AS `species_name`,`feeding_charts`.`feeding_weight` AS `feeding_weight`,`feeding_charts`.`feeding_cc` AS `feeding_cc`,`freequency_definition`.`freequency` AS `freequency`,`freequency_definition`.`freequency_description` AS `freequency_description` from ((`feeding_charts` join `species` on((`feeding_charts`.`feeding_species` = `species`.`species_id`))) join `freequency_definition` on((`feeding_charts`.`feeding_freequency` = `freequency_definition`.`freequency_definition_id`))) order by `feeding_charts`.`feeding_weight` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-06  9:11:10
