INSERT INTO `client` (`id`, `name`, `phone_number`, `address1`, `city`, `country`, `postal_code`) VALUES
(1, 'client BileMo', 132456789, '12 rue des telecom', 'Paris', 'France', 75002);

INSERT INTO `phone_brand` (`id`, `name`, `country`) VALUES
(1, 'Apple', 'Us'),
(2, 'Samsung', 'South Korea'),
(3, 'Sony', 'US'),
(4, 'LG', 'South Korea');


INSERT INTO `feature_category` (`id`, `name`) VALUES
(1, 'Memory'),
(2, 'Size'),
(3, 'Water proof'),
(4, 'Weight'),
(5, 'OS'),
(6, 'Chipset'),
(7, 'Camera'),
(8, 'Screen');


INSERT INTO `feature` (`id`, `feature_category_id`, `description`) VALUES
(1, 1, '4Go'),
(2, 2, '159.5 x 73.4 x 8.1 mm'),
(3, 3, 'IP68'),
(4, 4, '173 g'),
(5, 5, 'Android 7.0 (Nougat)'),
(6, 6, 'Octo Core 2,3 GHz (Quad 2,3 GHz + Quad 1,7 GHz)'),
(7, 7, '12 mégapixels'),
(8, 8, 'Super AMOLED'),
(9, 6, 'Apple A9 - Dual-core 1.84 GHz Twister'),
(10, 5, 'iOS 10'),
(11, 8, '4 pouces'),
(12, 1, '3 Go'),
(13, 2, '158.2 x 77.9 x 7.3 mm'),
(14, 8, '5.5 pouces'),
(15, 3, 'IP67'),
(16, 4, '188 g'),
(17, 1, '2 Go'),
(18, 1, '1 Go'),
(19, 4, '192 g'),
(20, 4, '113 g'),
(21, 4, '157 g'),
(22, 4, '143 g'),
(23, 4, '180 g'),
(24, 4, '136 g'),
(25, 6, 'Apple A9 - Dual-core 1.84 GHz Twister'),
(26, 6, 'MediaTek Helio P20 64 bits octa-core (quad-core 2,3 GHz + quad-core 1,6 GHz)'),
(27, 6, 'MSM8909 Quad Core 1.1 GHz'),
(28, 6, 'iOS 9'),
(29, 2, '123.8 x 58.6 x 7.6 mm'),
(30, 8, '4 pouces'),
(31, 2, '150.9 x 72.6 x 7.7 mm'),
(32, 2, '145 x 67 x 8 mm'),
(33, 2, '151 x 74 x 8.7 mm'),
(34, 2, '144.76 x 72.6 x 7.9 mm'),
(35, 5, 'Android 6.0 (Marshmallow)'),
(36, 5, 'Android 7.0 (Nougat)'),
(37, 7, '23 mégapixels'),
(38, 7, '13 mégapixels'),
(39, 7, '5 mégapixels'),
(40, 8, '5 pouces');




INSERT INTO `phone` (`id`, `phone_brand_id`, `name`, `description`, `price_excl_tax`, `price_incl_tax`) VALUES
(1, 2, 'Galaxy S8+', 'Le Samsung Galaxy S8 + bouscule les codes esthétiques et repousse les limites des écrans tels que vous les connaissiez. Son écran Infinity sublime la richesse des images et offre une immersion spectaculaire. Un nouveau monde s’ouvre au creux de votre main. Sortez du cadre.', 800, 900),
(2, 1, 'Apple iPhone 7 Plus', 'L’iPhone 7 Plus est doté de deux appareils photo 12 Mpx offrant un zoom haute résolution et une ouverture à ƒ/1,8 pour de superbes photos et vidéos en 4K, même en conditions de faible éclairage. De la stabilisation optique de l’image. D’un écran Retina HD 5,5 ', 0, 0),
(3, 1, 'iPhone 6s Plus', 'Avec 3D Touch, Live Photos, l’aluminium 7000 Series, la puce A9, un appareil photo et une caméra sophistiqués, un écran Retina HD de 5,5 pouces, et bien plus encore, vous constaterez qu’une seule chose a changé sur l’iPhone 6s Plus : tout.', 0, 0),
(4, 1, 'iPhone SE', 'Voici l’iPhone SE, le smartphone 4 pouces le plus puissant jamais créé, avec appareil photo 12 Mpx, Live Photos et Retina Flash pour des selfies toujours réussis. Doté de la puce A9, il donne un énorme coup de boost à vos activités quotidiennes et rend vos jeux plus ', 0, 0),
(5, 2, 'Samsung Galaxy S7 Edge', 'Samsung présente les nouveaux Galaxy S7 au design élégant et raffiné né de l’alliance du verre et du métal. Sublimé par son écran aux bords incurvés, le Galaxy S7 edge se distingue par sa ligne unique. Grâce à la technologie Dual Pixel, l’appareil photo est encore ', 0, 0),
(6, 3, 'Sony Xperia XA1', 'Sony Xperia XA1', 0, 0),
(7, 3, 'Sony Xperia L1', 'Sony Xperia L1', 0, 0),
(8, 4, 'LG K4 2017', 'LG K4 2017', 0, 0);




INSERT INTO `phone_feature` (`phone_id`, `feature_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 7),
(2, 9),
(2, 10),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(3, 7),
(3, 13),
(3, 14),
(3, 17),
(3, 19),
(3, 25),
(3, 28),
(4, 7),
(4, 10),
(4, 17),
(4, 20),
(4, 25),
(4, 29),
(4, 30),
(5, 3),
(5, 7),
(5, 14),
(5, 21),
(5, 31),
(5, 35),
(6, 12),
(6, 22),
(6, 26),
(6, 32),
(6, 36),
(6, 37),
(6, 40),
(7, 14),
(7, 17),
(7, 23),
(7, 33),
(7, 36),
(7, 38),
(8, 18),
(8, 24),
(8, 27),
(8, 34),
(8, 35),
(8, 39),
(8, 40);


INSERT INTO `user` (`id`, `client_id`, `username`, `email`, `password`) VALUES
(1, 1, 'user', 'user@user.fr', '$2y$10$4Vl61Fn8SwFdgA5lmcAoY.YAwbXUb7K7fXNKZ0ENBsxUUStLcDz2O');
