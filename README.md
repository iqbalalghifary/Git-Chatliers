
# Learnify

The Learning Management System (LMS) is a platform that provides educational materials and curriculum content to both urban and rural areas. It utilizes LoRa technology and cloud-based solutions to transmit data between urban and rural areas.

## Urban Server (Main Server)
In urban areas, curriculum and educational materials are developed and stored in the LMS. The data is then transmitted to rural areas using LoRa networks. In rural areas, Arduino devices receive the data and relay it to Raspberry Pi devices. The Raspberry Pi devices then transmit the data to a dedicated website through an API. This ensures that the data in both urban and rural areas is synchronized.

## Rural Server (School Server)
In rural areas, users can access and download educational materials from the website. The download requests are sent back to the city using LoRa technology. The Arduino devices in the city process the requests and direct Raspberry Pi devices to fetch the requested files. The retrieved files are then sent to Raspberry Pi devices in rural areas.

## Server Integration
To ensure efficient data management and storage, the Raspberry Pi devices in rural areas store the received files in a structured manner, according to predefined categories such as materials or curriculum. The files are organized within dedicated folders, such as the Public Folder.

In addition, sustainable energy sources are harnessed in rural areas through the use of Solar Trackers. These trackers track the sun's movement to enhance energy efficiency and store excess energy in Accu Batteries for use during periods of low sunlight.

This integrated system facilitates the equitable access of educational resources, regardless of geographic location, by combining advanced technology with sustainable energy solutions.

## Requirements

- PHP 8.0 or higher
- Database (e.g., MySQL)
- Web Server (e.g., Apache, Nginx, IIS)


## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository: `git clone https://github.com/zharmedia386/Learnify.git`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Run `cp .env.example .env` for create .env file
* Detail login, Username : `admin` Password `123456`
* Run application using `php spark serve` 

## Sustainable Development Goals (SDGs)
Our idea not only aligns with the vision of Indonesia 2045 but also actively promotes and supports three key points of the Sustainable Development Goals (SDGs), those are:

### 1. SDG point 4: "Quality Education" 
Enhancing access and quality of education in blank spot areas

### 2. SDG point 7: "Affordable and Clean Energy"
Utilization of Solar Energy and New Renewable Energy (NRE) Efficiency

### 3. SDG point 13: "Climate Action" 
Reducing Carbon Emissions and Climate Change Adaptation

## Related Stakeholder

### 1. Rural Teacher Program
### 2. Government
### 3. Engineer & Investor
### 4. Society

## Demo

[![Presentation Video](https://img.youtube.com/vi/xPvQJ_0ybXQ/0.jpg)](https://www.youtube.com/watch?v=xPvQJ_0ybXQ)

Link Video: https://www.youtube.com/watch?v=xPvQJ_0ybXQ

[![LMS Website Video](https://img.youtube.com/vi/BJjPEIdRxAU/0.jpg)](https://www.youtube.com/watch?v=BJjPEIdRxAU)

Link Video: https://www.youtube.com/watch?v=BJjPEIdRxAU

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Documentation

### Flowchart Page
<img src="https://github.com/zharmedia386/Learnify/blob/main/public/image-readme/flowchart OpenAcademy-Page-1.drawio.png" />\

### 3D Design Page
<img src="https://github.com/zharmedia386/Learnify/blob/main/public/image-readme/desain_3d_alat_rev.png" />

### Main Server
<img src="https://github.com/zharmedia386/Learnify/blob/main/public/image-readme/Main Server.jpg" />

### School Server
<img src="https://github.com/zharmedia386/Learnify/blob/main/public/image-readme/School Server.png" />
