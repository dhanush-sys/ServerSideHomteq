CREATE TABLE Product
(
    prodId int(4) AUTO_INCREMENT,
    prodName VARCHAR(30),
    prodPicNameSmall VARCHAR(100),
    prodPicNameLarge VARCHAR(100),
    prodDescripShort VARCHAR(1000),
    prodDescripLong VARCHAR(3000),
    prodPrice  DECIMAL(6,2),
    prodQuantity INT(4),
    CONSTRAINT PRIMARY KEY (prodId)
);

products:-

INSERT INTO product( prodName, prodPicNameSmall, prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) VALUES ("Razer DeathAdder","mouse.jpg","mouse2.jpg","Elite Gaming Mouse: 16,000 DPI Optical Sensor - Chroma RGB Lighting - 7 Programmable Buttons - Mechanical Switches - Rubber Side Grips - Matte Black","The #1 Best-Selling Gaming Mouse in the US Under $50: Source - The NPD Group, Inc., U.S. Retail Tracking Service, Mice, Gaming Designed, Based on Dollar Sales, ASP under $30 (Jan.- Dec. 2019)
High-Precision 16,000 DPI Optical Sensor: Offers on-the-fly sensitivity adjustment through dedicated DPI buttons (reprogrammable) for gaming and creative work
Immersive, Customizable Chroma RGB Lighting: Includes 16.8 million colors w/ included preset profiles; syncs with gameplay and Razer Chroma-enabled peripherals and Philips Hue products
7 Programmable Buttons: Allows for button remapping and assignment of complex macro functions through Razer Synapse
Ridged, Rubberized Scroll Wheel for Maximum Accuracy: Small, tactile bumps increases grip and allows for more controlled scrolling in high-stakes gaming situations
Durable Mechanical Switches: Supports up to 50 million clicks, backed by a 2 year warranty",35.00,46)

INSERT INTO product( prodName, prodPicNameSmall, prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) VALUES ("AMD Ryzen 5","ryzen.jpg","ryzen2.jpg","3600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler","The world's most advanced processor in the desktop PC gaming segment
Can deliver ultra fast 100+ FPS performance in the world's most popular games
6 Cores and 12 processing threads, bundled with the Quiet AMD Wraith Stealth cooler
4.2 GHz Max Boost, unlocked for overclocking, 35 MB of game Cache, ddr4 3200 support
For the advanced socket AM4 platform, can support PCIe 4.0 on x570 motherboards",174.99,38)


INSERT INTO product( prodName, prodPicNameSmall, prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) VALUES ("Acer Aspire 5","lap.jpg","lap2.jpg","Slim Laptop, 15.6 inches Full HD IPS Display, AMD Ryzen 3 3200U, Vega 3 Graphics, 4GB DDR4, 128GB SSD, Backlit Keyboard, Windows 10 in S Mode, A515-43-R19L,Black","AMD Ryzen 3 3200U Dual Core Processor (Up to 3.5GHz); 4GB DDR4 Memory; 128GB PCIe NVMe SSD
15.6 inches Full HD (1920 x 1080) Widescreen LED backlit IPS Display; AMD Radeon Vega 3 Mobile Graphics
1 USB 3.1 Gen 1 Port, 2 USB 2.0 Ports & 1 HDMI Port with HDCP support
802.11ac Wi-Fi; Backlit Keyboard; Up to 7.5 Hours Battery Life
Windows 10 in S mode. Maximum Power Supply Wattage 65 W",313.50,15)

INSERT INTO product( prodName, prodPicNameSmall, prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) VALUES ("Acer SB220Q","monitor.jpg","monitor2.jpg","bi 21.5 inches Full HD (1920 x 1080) IPS Ultra-Thin Zero Frame Monitor (HDMI & VGA port)","1. 5 inches Full HD (1920 x 1080) widescreen IPS display
And Radeon free Sync technology. No compatibility for VESA Mount
Refresh Rate: 75Hz - Using HDMI port
Zero-frame design | ultra-thin | 4ms response time | IPS panel
Ports: 1 x HDMI & 1 x VGA
Aspect ratio - 16: 9. Color Supported - 16. 7 million colors. Brightness - 250 nit
Tilt angle -5 degree to 15 degree. Horizontal viewing angle-178 degree. Vertical viewing angle-178 degree
75 hertz",89.99,7)

CREATE TABLE users
(
    userId int(4) AUTO_INCREMENT,
    userFname VARCHAR(30),
    userSname VVARCHAR(30),
    userType VARCHAR(30),
    userAddress VARCHAR(30),
    userPostCode VARCHAR(30),
    userTelNo  VARCHAR(30),
    userEmail VARCHAR(30),
    userPassword VARCHAR(30),
    CONSTRAINT PRIMARY KEY (prodId)
);
CREATE TABLE `w1714899_0`.`orders` ( `orderNo` INT(4) NOT NULL AUTO_INCREMENT , `userId` INT(4) NOT NULL , `orderDateTime` DATETIME NOT NULL , `orderTotal` DECIMAL(8,2) NOT NULL DEFAULT '0.0' , PRIMARY KEY (`orderNo`), INDEX (`userId`)) ENGINE = InnoDB;
CREATE TABLE `w1714899_0`.`order_line` ( `orderLineId` INT(4) NOT NULL AUTO_INCREMENT , `orderNo` INT(4) NOT NULL , `prodId` INT(4) NOT NULL , `quantityOrdered` INT(4) NOT NULL , `subTotal` DECIMAL(8,2) NOT NULL DEFAULT '0.0' , PRIMARY KEY (`orderLineId`), INDEX (`orderNo`), INDEX (`prodId`)) ENGINE = InnoDB;
ALTER TABLE Orders ADD CONSTRAINT userId FOREIGN KEY (userId) REFERENCES users(userId)
ALTER TABLE  Order_Line ADD CONSTRAINT orderNo FOREIGN KEY (orderNo) REFERENCES orders(orderNo)
ALTER TABLE  Order_Line ADD CONSTRAINT prodId FOREIGN KEY (prodId) REFERENCES product(prodId)