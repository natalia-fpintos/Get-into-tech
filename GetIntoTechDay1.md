# Get Into Tech #

## Day 1 ##

### What do software engineers do? ###

It is important that the developers **clarify** the business requirements
That way the **specifications** are clear. It is good to ask questions about this.
We should **not** make assumptions!

- Check requirements/environment
- Estimate time and complexity
- Estimate a goal
- Learn about tech
- Research
- Learn about the product
- Work with colleagues/team
- Work alone
- Testing
- Program
- Design
- Interact with other teams
- Problem solving
- Help colleagues
- Set limits and set realistic goals
- Be creative
- Give ideas or ask questions to the client to be clear about the product
- Make it scalable and expandable: future-proofing
- Review code and make it better
- Document
- Time-management
- Report back to the scrum master
- Regular feedback
- Fix bugs
- Write good and testable code
<br/>

#### What is the difference between a programmer, a developer and a software engineer? ####

- Programmers write code
- Developers need a bigger set of skills
- Software engineers continuously monitor the process to refine the process
<br/>

### Agile ###

Started in 1927. It has 12 pillars. You can adapt it so it works for your company.

Agile is a methodology for software development based on iterations and evolving based on customer requirements.

Rapid delivery of working software.
<br/>
<br/>

### Scrum ###

Scrum is an Agile framework.

In Scrum, the work is divided in sprints. These are timeboxed efforts, a basic unit of development, usually 2 weeks.
<br/>
<br/>

#### Scrum artifacts ####

The **product backlog** represents all the things that need to be done in the project, can either be technical or user-centric (user stories).

Items higher up in the prioritised list are broken down into detailed user stories. Items further down the list may be left as large, currently undetailed user stories, often referred to as *epics*.

In order to prioritise the list some teams use the **MOSCOW** technique:
  - Must Have
  - Should Have
  - Could Have
  - Won’t Have

The **sprint backlog** is a list of tasks identified by the Scrum team with the functionality to be completed during the next sprint and the work needed to deliver that functionality into a “Done” state.

During the sprint planning meeting, the team selects some number of product backlog items, usually in the form of user stories, and identifies the *tasks* necessary to complete each user story.

The team also estimate the *effort* involved in each task to ensure they neither over or under-commit to work during the sprint.

This makes visible all the work necessary to meet the *Sprint Goal*.

The **Scrum board** is a visual display of the progress of the Scrum team during a sprint. It shows which tasks are pending, in progress or done.

**Burndown charts** represent how we are doing comparing work left to do vs. time spent. It's useful to predict when the work will be completed.

**User stories** are a tool used in Agile to capture a short, simple description of a software feature (a requirement) from an end-user perspective. They describe type of user, what they want and why.

They typically follow a template:
```
As a <type of user>, I want <some capability> so that <some goal>.
```
<br/>

#### Scrum meetings ####

In the **stand-ups** we would talk about 3 things:
- What did we do yesterday
- What are we doing today
- What impediments do we have

No knowing how to do something is not really an impediment, we can dedicate time to learn it. An impediment would be something like needing a database user.

The **sprint planning** meetings are used to determine the work that is achievable in the sprint and the work that the team needs to commit to it. These occur at the start of a sprint.

In the **daily stand-ups** we would talk about 3 things:
- What did we do yesterday
- What are we doing today
- What impediments do we have

No knowing how to do something is not really an impediment, we can dedicate time to learn it. An impediment would be something like needing a database user.

The **sprint review** happens at the end of a sprint and is used to review work, receive feedback, showcase work and deliver results.

The **sprint retrospective** also happens at the end of a sprint and is used to reflect on how the sprint went, what could be improved, what worked well, etc.
<br/>
<br/>

#### Parts/roles of a Scrum team ####
- Product owner
- Scrum master
- Development team
<br/>

### What personality traits are essential for a software engineer to succeed? ###

#### Skills: ####
- Good at solving problems
- Communication and explaining
- Programming language skills
- Time management
- Understanding and reiterating ideas
- Team work
- Collaboration
- Multi-task effectively
- Forward planning
- Visualising
- Break down problems

#### Traits: ####
- Creative
- Think outside of the box
- Attention to details
- Analytical
- Assertive
- Resilient
- Accept failure as part of the success
- Adaptive
- Excited about your work
- Open minded
- Open to challenge and a fast pace
- Driven
- Open to change
- Avid learner, open to learn
- Passion
- Inquisitive
- Methodical
- Proactive
- Patience
<br/>

### The internet ###

Recommended reading material:
- Where wizards stay up late: The origins of the Internet.

The first internet networks were for the military or research:
- ArpaNet in USA
- Minitel in France
- JANE in the UK
<br/>

#### Internet vs Intranet vs Extranet ####

- Internet is the external network, it's public
- Intranet is the internal network, it's private
- Extranet is when we use the Internet to access the Intranet (i.e. access our bank account)
<br/>

#### Packet Internet Groper ####

Ping is a way to check how long it takes to send a package to a server.

```
$ ping www.google.com
```

```
$ ping www.ns.nl
```

When we ping an address we get the IP address of the website (i.e. 95.101.18.20).
A ping basically goes to the address and comes back and tells you how long it took.
<br/>
<br/>

### HTTP: HyperText Transfer Protocol ###

**GML: General Markup Language.** The first markup language, became an ISO standard and was renamed **SGML**. From it came **HTML**. GML looked like this:
```
<! ... >
```

**HTTP** is a higher level language that is set over TCP/IP which is a lower level language.

**TCP/IP** is the Transmission Control Protocol and IP is the Internet Protocol.

**ICMP** are a sort of ping "traffic cops" that check the network traffic and help the router
identify what routes to use. They stand for Internet Control Messaging Protocol.

**DNS** is the Domain Name System. It provides a way to match an IP address to a domain that is easier to remember and identify. The DNS of websites we've visited is cached for performance and we can display it. We can also flush the DNS to clear it.
<br/>
<br/>

### Localhost ###

We can access our localhost, which is in our private IP address: 127.0.0.1
```
$ ping localhost
```
We also have a different public IP address, which is the one used outside our network.
<br/>

### FTP: File Transfer Protocol ###

If we try to access a site that runs in FTP with HTTP it won't work because it's a different
protocol. We need to replace `http://` with `ftp://` instead.
<br/>
<br/>

### Dig ###

We can use Google Dig to see all the information related to a domain.
