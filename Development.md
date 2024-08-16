# Development of a Database-Linked Website for NCEA Level 2

Project Name: **PROJECT NAME HERE**

Project Author: **YOUR NAME HERE**

Assessment Standards: **91892** and **91893**


-------------------------------------------------

## Design, Development and Testing Log

### 16/05/2024

![UI design version 1](images/ui_design1.png)
Brief UI design and how the system might work.

This is a sample design of my system as well as showing how it could work roughlt. I used this to talk to Mr. Copley if it is going to work and if the system meets all of the requirements. He said yes and noted that I should leave the last bit on the teacher's interface where he can edit the details until the very last and focus on making the other things perfect first. He also mentioned the portal log-in for the admin because he will be the only person who can add and make changes to the system. 

### 20/05/2024

![Database table design](images/dtbase_design1.png)

Making and linking 2 tables for the database.

There are 2 tables for my database which are the project table and the student's table with the project id as a foreign key. This is just the first version of it. I will need to talk to my client to see if it needs to be alter or change.

### 21/05/2024

![1st student's interface flow](images/student_flow1.png)
First version of student's interface view flow design. 

### 23/05/2024

![Alt text](images/flow2.png)
flow design for both admin and students. Some color changes to avoid confusion

### 25/05/2024

![Alt text](images/admin_flow.png)

Working on admin's inteface view flow design. I will make sure to talk to my client on Tuesday to see of any changes should be made. Especially the part where he deletes and submits the form.

### 27/05/2024
![Alt text](images/admin_flow2.png)

This is the finishing look for the first version of admin's interface view flow. I got a feed back from Jess, my classmate, suggesting that I should add the "add area of interest" form and after submitting the "add ideas form" from the home page, it should go to the "add ideas" page instead of the homepage. I will talk to my client tomorrow and see if any changes are to be made.

Pink = everyone, 
Blue = admin only, 
Light blue = the least priority, 
Green = unsure/need feedback/optional

### 30/05/2024
![Alt text](images/students_UI.png)
Working on student's UI

Got a feedback from my client on Friday on the system flow.
> I am not a girl myself, so I want them to be able to add stuff to the system as well.But I still have to be able to choose and check like which one can be added to the system.

So, my client wants students to be able to add ideas to the system. He wants to be able to see those added items and choose which one to add to or delete from the system. I have changed my mine on the database table, system flow and student's UI.
![Alt text](images/dtb2.png) 

### 31/05/2024
![Alt text](images/student_flow3.png)
This is a new version of system flow. Boxes in blue color are only for teacher/admin and actions in blue arrows can only be done when teacher/admin has logged in. Students are now able to add ideas to the system.

![Alt text](images/student_UI2.png)
Also, a new version of students UI.

### 14/06/2024
![alt text](images/student_ui_color1.png)
I put the color from real time color into my user's interface design. Then I showed my client the system flow and the UI design to get some feedback.
> The flow and the UI look pretty good, but I would prefer the colors to be something like orange, cahrcoal and white because they are the colors that I can find in this room. As for the font, I quite a fan of Gilsans.

So my client want the colors orange, white and charcoal on the website and use Gilsans as a font.
Here are some options I made for my client for the colors:
![alt text](images/ui_color_option1.png)
![alt text](images/ui_color_option2.png)
![alt text](images/ui_color_option3.png)

### 07/07/2024
I am currentky working on the website write now.

Homepage:
![alt text](images/home-1.png)
Add new area form:
![alt text](images/new-area-1.png)
Idea list page:
![alt text](images/idea-list-1.png)
Idea details:
![alt text](images/details-1.png)
Add new idea form:
![alt text](images/new-idea-1.png)
Admin login:
![alt text](images/login-1.png)
Added ideas:
![alt text](images/added-ideas-1.png)
There is no longer "pick area of interest page " as designed because the user can simply add new ideas to the area that they have clicked into.

### 30/07/2024
Working on css and functionality of the website. I will make sure to have a chat with my client to see if I am on the right track.

![Alt text](images/index1.png)

### 07/08/2024
I caught up with my client today and had a chat about the overall functionality of the website and the design. He said that it is looking really good but there are 2 main things that I need to change to match his need:
1. The "position-sticky" of the top
> I prefer it to be non-sticky.

He also gave reasons that "there's nothing really important up there" and "it's taking quite a bit of the space of the screen, especially when it is small"

Sticky
![Alt text](images/sticky.png)

non-sticky
![Alt text](images/non-sticy.png)

2. Edit button
I asked him if he would like to be the only one who can edit details of ideas or students should also be able to do so as well. He said it is a "great idea" for the students to be able to edit them as well,

Can only edit when logged-in
![Alt text](images/edit-only.png)
Anyone can edit without logging in
![Alt text](images/edit-all.png)

I asked about how he would like the navigation bars to change as the user hovers over and at the moment, I am using the underline. I gave him an option of using an orange color.
>It looks more professional when it's underlined and i don't think the orange color really contrast with the background

Here's how it looks like


Lastly, he mentioned that if I have time, he wants the website to somehow allows him to check/approve to the added ideas from students before they actually go into the system/website.

### 09/08/2024
![Alt text](images/link-hover.png)

My client wants to be able to click the link not just on the external link icon but at the "Find out more" as well.

So i fixed it. The arange color represents how the link is being hover over at the moment.
![Alt text](images/link-hover-fixed.png)

### 15/08/2024
![Alt text](image.png)
I just found that the form for editing requires a change in image, which is not necessary. So I removed the "required" form my php to make sure that you can submit the edit form without having to choose a new image.

I suuggested my client that it would be a great idea if you hover on the action buttons on the idea list and the color changes. He replied to me:
>Correct, colour changes over each button would be great, though how would it work on mobile?
![Alt text](image-2.png)
![Alt text](image-1.png)

I finished my edit form today. The edited data is also link to the added idea table so the changes will appear there as well.

### 16/08/2024
Mr. Copley mentioned to me yester day that it was not a good idea to let everyone be able to edit idea details. I then go on and talk to my client again about it, so he though about it again and agreed that admin should be the only person to be able to edit details.
![Alt text](image-10.png)
![Alt text](image-11.png)

![Alt text](image-12.png)
![Alt text](image-13.png)
![Alt text](image-14.png)

![Alt text](image-15.png)
![Alt text](image-16.png)
So he wants to say that he think the title of the website on the top should be slightly bigger than the main heading of the homapge because at the moment, they are pretty much the same size.
![Alt text](image-17.png)
