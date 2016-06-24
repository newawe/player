  <style>
    
    .projectContainer{
      width: 250px; /*Easily change the size here*/
      height: 250px;
      border: solid 3px #00A3C6;
      border-radius: 3px;
      box-shadow: 0 0 3px 0px #000000;
      background-color: #00A3C6;
      position: relative;
      margin: 15px; /*Change this for spacing*/
    }
    .projectContainer:hover{
      box-shadow: 0 0 6px 0px #000000;
      background-color: #00B0D0;
      border: solid 3px #00B0D0;
    }
    .projectThumb{
      width: 100%;
    }
    .projectTitle{
      color: #FFFFFF;/*Would be cool if the user could also pick to use an alternate color like #00A3C6*/
      position: absolute;
      bottom: 65px;
      font-size: 30px;
      text-align: right;
      width: 100%;
      font-weight: 600;
      right: 5px;
    }
    .projectDescription{
      width: 100%;
      height: 100%;
      text-align: left;
      margin: 5px;
      color: #FFFFFF;
      font-size:20px;
    }
    body{
      background-color: #F7F7F7; 
    }
  </style>

<div class="projectContainer">
  <img class="projectThumb" src="http://materializecss.com/images/sample-1.jpg"><!--Example-->
<div class="projectTitle">Example Title</div>
  <div class="projectDescription">Example Description</div><!--Make sure to limit to two lines-->
</div>
