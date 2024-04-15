<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeE (Feedback on Everything)</title>
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
                <li><a href="#feature-1">4.1 System Feature 1</a></li>
                <li><a href="#feature-2">4.2 System Feature 2 (and so on)</a></li>
            </ul>
        </li>
        <li><a href="#nonfunctional-requirements">Other Nonfunctional Requirements</a>
            <ul>
                <li><a href="#safety">5.2 Safety Requirements</a></li>
            </ul>
        </li>
    </ul>
</nav>

<h1>Development of a Web Tool for Anonymous Feedback Collection</h1>

<p><strong>Authors:</strong> Panaite Alexandra-Mihaela, Ghența Ana-Maria </p>

<h2 id="introduction">1 Introduction </h2>
<h3 id="product-scope">1.4 Product Scope</h3>

<p>The web tool aims to facilitate anonymous feedback collection for various entities, including events, persons, geographic locations, products, services, artistic artifacts, etc. Feedback is captured in the form of emotions specified according to the Plutchik model. The application, accessible via a REST/GraphQL API, manages the entities to be evaluated and the specific responses received for each entity. Feedback collection requests are editable by the initiator, and statistics are generated after the collection period, providing insights based on recorded emotions and various criteria such as user demographics, time periods, subcategories, and positive/negative characteristics.</p>

<h2 id="references">1.5 References</h2>

<p><a href="https://edu.info.uaic.ro/web-technologies/">https://edu.info.uaic.ro/web-technologies/</a></p>
<p><a href="https://profs.info.uaic.ro/andrei.panu/courses/web/lab/webprojects.html">https://profs.info.uaic.ro/andrei.panu/courses/web/lab/webprojects.html</a></p>
<p><a href="https://www.figma.com/files/recents-and-sharing/recently-viewed?fuid=1360963838874921099">https://www.figma.com/files/recents-and-sharing/recently-viewed?fuid=1360963838874921099</a></p>

<h2 id="overall-description">2 Overall Description</h2>

<h3 id="product-functions">2.2 Product Functions</h3>

<p>The web tool encompasses the following key functions:</p>

<ol>
    <li>Create and manage feedback collection requests for different entities.</li>
    <li>Edit and update feedback collection details, including the entity to be evaluated, duration of the collection period, and specified emotions.</li>
    <li>Analyze collected feedback data to generate comprehensive statistics and insights.</li>
    <li>Present reports containing aggregated data on recorded emotions, considering multiple criteria such as user groups, evaluation time periods, subcategories of entities, and characteristics deemed positive/negative based on shared emotions.</li>
</ol>

<h3 id="user-classes-and-characteristics">2.3 User Classes and Characteristics</h3>

<p>The web tool caters to the following user classes:</p>

<ul>
    <li><strong>Initiators:</strong> Users who create and manage feedback collection requests. They have the authority to edit request details and monitor progress.</li>
    <li><strong>Respondents:</strong> Users who provide feedback for specific entities anonymously. They interact with the tool to submit their emotions.</li>
    <li><strong>Administrators:</strong> Users responsible for overall system management and administration, including user roles and permissions.</li>
</ul>

<h3 id="environment">2.4 Operating Environment</h3>

<ul>
    <li><strong>Hardware Platform:</strong> The application will run on a dedicated or virtualized web server with adequate processing and storage capacity to handle the expected volume of data and user traffic. We will use a server with powerful processors and enough RAM.</li>
    <li><strong>Operating System:</strong> The Software will be developed to run on various Linux, Windows, and macOS operating systems (if required).</li>
    <li><strong>Software components:</strong>
        <ul>
            <li>Web Server: A web server such as Apache HTTP Server will be used to serve HTTP requests received from clients and handle communication with the database and other components.</li>
            <li>Database: A database management system (DBMS) will be used to store and manage the data collected and processed by the application. We will use a relational database such as MySQL, PostgreSQL, or Microsoft SQL Server.</li>
            <li>REST/GraphQL API: The application will expose a REST or GraphQL API to enable communication between client and server.</li>
            <li>Data format: HTML, CSV, and JSON will be used for generated reports to ensure their compatibility and accessibility for different user needs.</li>
        </ul>
    </li>
</ul>
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
<p>The system communicates with users and other systems through a REST/GraphQL API for handling requests and responses. A detailed diagram of this interface has been created using Figma and is available for reference.</p>

<h3 id="communications-interfaces">3.4 Communications Interfaces</h3>
<p>The system may interact with other external systems for authentication, notifications, or other services. A detailed diagram of these interfaces has been created using Figma and is available for reference.</p>


<h2 id="anonymous-feedback-submission">4. Feature: Anonymous Feedback Submission</h2>

<ul>
    <li><strong>Description and Priority:</strong>
        <ul>
            <li><strong>Description:</strong> This feature enables users to submit anonymous feedback for various items, such as events, persons, locations, products, services, or artistic artifacts, including specifying an emotion according to the Plutchik model.</li>
            <li><strong>Priority:</strong> High (Benefit: 8, Penalty: 2, Cost: 5, Risk: 7)</li>
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
            <li><strong>User Safety:</strong> Design the product to minimize risks like electric shock and fire hazards.</li>
            <li><strong>Labeling and Instructions:</strong> Provide clear labels and user instructions for safe usage.</li>
            <li><strong>Testing and Certification:</strong> Test and certify the product with an accredited organization for CE compliance.</li>
        </ul>
    </li>
</ul>

<hr>


</body>
</html>
