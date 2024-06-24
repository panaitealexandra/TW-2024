<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeH (FeedbackHub)</title>

</head>
<body>

<nav>
    <ul>
        <li><a href="#introduction">Introduction</a>
            <ul>
                <li><a href="#scope">1.4 Product Scope</a></li>
                <li><a href="#references">1.5 References</a></li>
            </ul>
        </li>
        <li><a href="#overall-description">Overall Description</a>
            <ul>
                <li><a href="#functions">2.2 Product Functions</a></li>
                <li><a href="#user-classes">2.3 User Classes and Characteristics</a></li>
                <li><a href="#environment">2.4 Operating Environment</a></li>
                <li><a href="#assumptions">2.7 Assumptions and Dependencies</a></li>
            </ul>
        </li>
        <li><a href="#external-interface-requirements">External Interface Requirements</a>
            <ul>
                <li><a href="#user-interfaces">3.1 User Interfaces</a></li>
                <li><a href="#hardware-interfaces">3.2 Hardware Interfaces</a></li>
                <li><a href="#software-interfaces">3.3 Software Interfaces</a></li>
                <li><a href="#communications-interfaces">3.4 Communications Interfaces</a></li>
            </ul>
        </li>
        <li><a href="#system-features">System Features</a>
            <ul>
                <li><a href="#feature-1">4.1 Functionality: Submitting Anonymous Feedback
</a></li>
            </ul>
        </li>
        <li><a href="#nonfunctional-requirements">Other Nonfunctional Requirements</a>
            <ul>
                <li><a href="#safety">5.2 Safety Requirements</a></li>
            </ul>
        </li>
        
    
</nav>

<h1>Development of a Web Tool for Anonymous Feedback Collection</h1>

<p><strong>Authors:</strong> Panaite Alexandra-Mihaela, Ghența Ana-Maria </p>

<h2 id="introduction">1 Introduction </h2>
<p>FeedbackHub is a web platform that specializes in collecting anonymous feedback for various entities, including events, people, geographic locations, products, services and artistic artifacts. Users can express feedback in the form of emotions, according to the Plutchik model. The platform is accessible through a REST/GraphQL API, allowing management of evaluated entities and the specific responses received for each entity. Feedback collection requests can be edited by originators, and statistics are generated after the collection period, providing insights based on recorded emotions and criteria such as user demographics, time periods, subcategories and positive/negative characteristics.
</p>
<h3 id="product-scope">1.4 Product Scope</h3>

<p>FeedbackHub facilitates the collection of anonymous feedback for various entities. Users can send feedback by expressing emotions according to the Plutchik model. The platform allows the management of feedback requests, the generation of statistical reports and the provision of information based on the collected data.
</p>

<h2 id="references">1.5 References</h2>

<p><a href="https://edu.info.uaic.ro/web-technologies/">https://edu.info.uaic.ro/web-technologies/</a></p>
<p><a href="https://profs.info.uaic.ro/andrei.panu/courses/web/lab/webprojects.html">https://profs.info.uaic.ro/andrei.panu/courses/web/lab/webprojects.html</a></p>
<p><a href="https://www.figma.com/files/recents-and-sharing/recently-viewed?fuid=1360963838874921099">https://www.figma.com/files/recents-and-sharing/recently-viewed?fuid=1360963838874921099</a></p>

<h2 id="overall-description">2 Overall Description</h2>

<h3 id="product-functions">2.2 Product Functions</h3>

<p>FeE includes the following main functionalities:

</p>

<ol>
    <li>    Management of Feedback Requests: Users can create, edit and manage feedback requests, specifying the evaluated entity, the length of the collection period and the allowed emotions.
</li>
    <li>    Analysis of Collected Feedback: The platform analyzes the collected feedback to generate statistical reports for each form. These reports provide information based on recorded emotions.
</li>
</ol>

<h3 id="user-classes-and-characteristics">2.3 User Classes and Characteristics</h3>

<p>
FeedbackHub is intended for the following classes of users:

</p>

<ol>
    <li>        Initiators: Users who initiate and manage feedback requests. They must be logged in to be able to create a feedback form.

</li>
    <li>   Respondents: Users who provide anonymous feedback for various entities. They interact with the platform to send their emotions.

</li>
</ol>
<h3 id="environment">2.4 Operating Environment</h3>

<p>
FeedbackHub operates in an environment specified as follows:
</p>

<ol>
    <li>           Hardware Platform: The application runs on a dedicated or virtualized web server with adequate processing and storage capacity to handle the volume of data and user traffic.
</li>
    <li>      Operating Systems: Developed to run on Linux, Windows and macOS operating systems (if required).
</li>
</ol>
        <p>
             Software Components:
        </p>
        <ol> 
         <li>                  Web Server: Uses a web server (Apache HTTP Server) to handle HTTP requests and communicate with the database and other components.
</li>
    <li>             Database: Uses a MySQL database management system (DBMS) to store and manage the collected data.
</li>
 <li>           REST API: Exposes a REST API to facilitate client-server communication.
</li>
    <li>      Data Format: Generated reports are available in HTML, CSV and JSON formats, thus ensuring compatibility and accessibility for different user needs.
</li>
        </ol>
    

<h3 id="assumptions">2.7 Assumptions and Dependencies</h3>

<ul>
    <li><strong>Assumptions:</strong>
        <ul>
            <li>Users will be willing to provide anonymous feedback.</li>
            <li>Internet infrastructure will be accessible and stable.</li>
            <li>Data collected and processed will be accurate and secure.</li>
            <li>Clients or end-users will be interested in using the application.</li>
        </ul>
    </li>
    <li><strong>Dependencies:</strong>
        <ul>
            <li>Reliance on third-party APIs for authentication, notifications, etc.</li>
            <li>Dependence on hosting/cloud services for availability and scalability.</li>
            <li>Need for browser compatibility for a consistent user experience.</li>
        </ul>
    </li>
</ul>

<h2 id="external-interface-requirements">External Interface Requirements</h2>

<h3 id="user-interfaces">3.1 User Interfaces</h3>
<p>The user interface provides an interactive experience for users, including web pages, feedback forms, and generated reports. A detailed diagram of these interfaces has been created using Figma and is available for reference.</p>

<h3 id="hardware-interfaces">3.2 Hardware Interfaces</h3>
<p>No specific hardware interfaces are required for the operation of the system.</p>

<h3 id="software-interfaces">3.3 Software Interfaces</h3>
<p>The system communicates with users and other systems through a REST API for handling requests and responses. A detailed diagram of this interface has been created using Figma and is available for reference.</p>

<h3 id="communications-interfaces">3.4 Communications Interfaces</h3>
<p>The system may interact with other external systems for authentication, notifications, or other services. A detailed diagram of these interfaces has been created using Figma and is available for reference.</p>


<h2 id="anonymous-feedback-submission">4. Feature: Anonymous Feedback Submission</h2>

<ul>
    <li><strong>Description and Priority:</strong>
        <ul>
            <li><strong>Description:</strong> This feature enables users to submit anonymous feedback for various items, such as events, persons, locations, products, services, or artistic artifacts, including specifying an emotion according to the Plutchik model.</li>
            <li><strong>Priority:</strong> High </li>
        </ul>
    </li>
    <li><strong>Stimulus/Response Sequences:</strong>
        <ul>
            <li>User selects "Submit Feedback" option.</li>
            <li>System presents feedback submission form.</li>
            <li>User inputs the item to evaluate and selects emotion from Plutchik model.</li>
            <li>System records feedback and confirms successful submission.</li>
        </ul>
    </li>
    <li><strong>Functional Requirements:</strong>
        <ul>
            <li><strong>Feedback Submission Interface:</strong> System shall provide user-friendly interface for feedback submission.</li>
            <li><strong>Anonymous Feedback Storage:</strong> System shall securely store submitted feedback in database.</li>
            <li><strong>Confirmation Message:</strong> Upon successful submission, system shall display confirmation message to user.</li>
            <li><strong>Error Handling:</strong> System shall validate user inputs for feedback submission form. If invalid inputs detected, system shall prompt user for correction.</li>
        </ul>
    </li>
</ul>


<h2 id="nonfunctional-requirements">Other Nonfunctional Requirements</h2>

<h3 id="safety-requirements">5.2 Safety Requirements</h3>

<ul>
    <li><strong>To meet European market standards, the product must adhere to relevant EU directives and obtain CE marking. The following safety requirements apply:</strong>
        <ul>
            <li><strong>Directive Compliance:</strong> Ensure compliance with specific directives.</li>
            <li><strong>Labeling and Instructions:</strong> Provide clear labels and user instructions for safe usage.</li>
        </ul>
    </li>
</ul>

<hr>


</body>
</html>
