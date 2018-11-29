<?xml version="1.0" encoding="UTF-8"?>
<WebElementEntity>
   <description></description>
   <name>body_Home  About  Plans  Why V</name>
   <tag></tag>
   <elementGuidId>b1777c65-8866-4806-9298-0624389be214</elementGuidId>
   <selectorCollection>
      <entry>
         <key>XPATH</key>
         <value>//body</value>
      </entry>
   </selectorCollection>
   <selectorMethod>XPATH</selectorMethod>
   <useRalativeImagePath>false</useRalativeImagePath>
   <webElementProperties>
      <isSelected>true</isSelected>
      <matchCondition>equals</matchCondition>
      <name>tag</name>
      <type>Main</type>
      <value>body</value>
   </webElementProperties>
   <webElementProperties>
      <isSelected>true</isSelected>
      <matchCondition>equals</matchCondition>
      <name>text</name>
      <type>Main</type>
      <value>




  Home
  About
  Plans
  Why Vote?
  Volunteer
  Para Español
  
    
  







  
    VOTE FOR JERRY B. MERCADO
    New Brunswick Board of Education Candidate
    






  

  
  
    
      
      
        Public School Uniforms
      
    

    
    
      
      
        Public School Uniforms 2
      
    

    
    
      
      
        New Brunswick Housing Authority
      
    


    
    
      
      
        New Brunswick Recreational Soccer League
      
    
    
    
      
      
        My Children
      
    

    
    
      
      
        2013 NB Little League Opening Ceremony
      
    

    
    
      
      

      
        
        
        
        
        
        
      
    
  



  
    
    Educational Involvement: 
    
        
        Advocated for a program of mandatory school uniforms for students in New Brunswick Public Schools.
       Created New Brunswick Little League to teach competitive baseball. 
      

    Community Involvement: 
    
        
       Implemented a scholarshop program for public housing residents.
       Coached New Brunswick children in different athletic programs.
      

    Board Experience in New Brunswick: 
    
        
       Founder &amp; President: New Brunswick Little League: 2012 -2016.
       Board Member: Zoning Board of Adjustment: 2002 - 2009. 
       Commissioner: New Brunswick Housing Authority: 1997 -2002. 
      
    
  




// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName(&quot;mySlides&quot;);
  var dots = document.getElementsByClassName(&quot;demodots&quot;);
  if (n > x.length) {slideIndex = 1}
  if (n &lt; 1) {slideIndex = x.length} ;
  for (i = 0; i &lt; x.length; i++) {
     x[i].style.display = &quot;none&quot;;
  }
  for (i = 0; i &lt; dots.length; i++) {
     dots[i].className = dots[i].className.replace(&quot; w3-white&quot;, &quot;&quot;);
  }
  x[slideIndex-1].style.display = &quot;block&quot;;
  dots[slideIndex-1].className += &quot; w3-white&quot;;
}




  function myFunction() {
      var x = document.getElementById(&quot;myTopnav&quot;);
      if (x.className === &quot;topnav&quot;) {
          x.className += &quot; responsive&quot;;
      } else {
          x.className = &quot;topnav&quot;;
      }
  }
  
  
  





  To the top
   Paid for by the Committee to Elect Jerry B. Mercado. 
  Powered by w3.css





'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd &amp;&amp; (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0766'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
/html[1]/body[1]</value>
   </webElementProperties>
   <webElementProperties>
      <isSelected>false</isSelected>
      <matchCondition>equals</matchCondition>
      <name>xpath</name>
      <type>Main</type>
      <value>/html[1]/body[1]</value>
   </webElementProperties>
   <webElementXpaths>
      <isSelected>true</isSelected>
      <matchCondition>equals</matchCondition>
      <name>xpath:position</name>
      <value>//body</value>
   </webElementXpaths>
</WebElementEntity>
