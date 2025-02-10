<template>
    <div>
       
        <footer class="footer">
        <div class="footer-title">
            POWERED BY<br>
            <img src='/media/textBS.png' alt="Flowers in Chania" style="width:150px;height:auto;">
        </div>
        
        <div class="footer-content">
            <div class="footer-column">
                <h3>About BarkSpider</h3>
                
                <p>
                    BarkSpider is a forward-thinking tech startup focused on creating cutting-edge solutions that drive innovation across industries.</p>
            </div>
            
            <div class="footer-column">
                <!-- <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul> -->
            </div>
            
            <div class="footer-column">
                <h3>Contact Info</h3>
                <ul>
                    <li>Email: barkspidersoft@gmail.com</li>
                    <li>Facebook: https://www.facebook.com/BSSoftwareSolution</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 BarkSpider. All rights reserved.</p>
        </div>
    </footer>
    </div>
</template>

            <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
    
            .footer {
                background-color: #333;
                color: white;
                font-family: Arial, sans-serif;
            }
    
            .footer-title {
                font-size: 10px;
                background-color: #444;
                padding: 3px;
                text-align: center;
            }
    
            .footer-content {
                background-image:url('/media/logoBS.png');
                /* background-color: #212121; */
                background-repeat:no-repeat;
                background-size:contain;
                background-position:center;
                
                
                display: flex;
                flex-wrap: wrap;
                /* padding: 40px 20px; */
                max-width: 1200px;
                margin: 0 auto;
                justify-content: space-between;
            }
    
            .footer-column {
                flex: 1;
                min-width: 250px;
                margin: 3px;
                padding: 0 15px;
            }
    
            .footer-column h3 {
                margin-bottom: 20px;
                color: #fff;
            }
    
            .footer-column p {
                line-height: 1.6;
                color: #ccc;
            }
    
            .footer-column ul {
                list-style: none;
            }
    
            .footer-column ul li {
                margin-bottom: 10px;
            }
    
            .footer-column ul li a {
                color: #ccc;
                text-decoration: none;
            }
    
            .footer-column ul li a:hover {
                color: #fff;
            }
    
            .copyright {
                background-color: #222;
                padding: 1px;
                text-align: center;
                color: #888;
            }
    
            /* @media (max-width: 768px) {
                .footer-column {
                    flex: 100%;
                    text-align: center;
                }
            } */
        </style>