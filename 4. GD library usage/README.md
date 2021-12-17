## Word Scrambler
This is a simple program that takes in a word and scrambles it in a way that it is still readable as per the research by Cambridge researchers

### Pre-requisites to run this program
1. Install at least PHP 7.2 on your computer

## Instructions to access the app
1. Open a terminal at the current working directory ( cwd )
2. Make sure you can see gd-image-printer.php and checker-draw.html files at the same location
3. Start a php web server using the following command
    
    `php -S localhost:8000`
    
    >> NOTE: if Port 8000 is in use in your computer, you can try other ports like 8080, 3000, 4000 etc
    
 4. Your web server is live and kicking. 
 5. Visit /gd-image-printer.php to access the app and enjoy!. For example, with the above web service running, you can access the app via
    `http://localhost:8000/gd-image-printer.php`
    > The above will use the default dimensions set length=50; height=500; width=500 to construct the image
 6. You can specify the image dimensions through the url parameters for a custom size. e.g
     `http://localhost:8000/gd-image-printer.php?width=500&height=500&length=50`
    
 7. This image can also be rendered using the html image tag, and you can do this by visiting
    `http://localhost:8000/checker-draw.html`
 8. The dimensions of the image can also be modified in the image attributes as well