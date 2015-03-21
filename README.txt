- Setup
  --> Standard LAMP stack using Ubuntu Server 64 in an Oracle Virtualbox VM
  --> AngularJS
  --> Super-basic HTML front-end with a little CSS to make it look prettier, yet somehow probably still ugly as sin. I'm not a designer. You have been forewarned.

"Why Linux", you might ask. The short answer: it was available and inexpensive. I use Debian/Ubuntu/Fedora/Gentoo Linux for all of my development at home, usually. Because of that, spinning up a VM clone and reconfiguring for LAMP was really easy to do. Additionally, the only thing I had to pay for was, well, literally nothing. I already had the image downloaded. I guess I had to pay for the internet access to download the disk image? Anyways, the less money, the better.

Also, while I /could/ have used work resources to assemble this example, I didn't feel it was a professional move to do so. There I have access to SQL Server, VS, etc. but I would also have to make everyone who saw this example sign an NDA. Not very practical, especially since this is going into a public repository.

When trying to figure out what language I wanted to use, I was thinking that mimicing the C# setup would be the ideal situation - using platforms such as: IIS, C#, AngularJS, nHibernate, etc. And then I got a chance to look at some of the code in the example and felt it would be a little like cheating because I would have the example to reference. That, and I also felt that I could use this as a learning opportunity of my own to see how AngularJS functions.

I decided to put this crappy little table in a database. It's unlikely that this Kata thing is something that anyone would like to expand upon, but I should proceed as if this was a normal project, eh? Additionally, I felt like SQL can probably hammer out some of the problem instead of relying solely upon the web-service to do the processing, making our life a little easier and off-loading some of that processing work to a system designed to do data manipulation (i.e. making sense of the price break code). 

Why MySQL? It was part of the LAMP stack installation and, well, I am being lazy with this part of the setup. I didn't want to spin up both a SQL Server install at my home as well as IIS, etc. on Windows. LAMP was just more accessible, and, hey, it comes with a database instance installed and mostly configured to work.

------------------- PLANNING -------------------

So, if you want to be in my brain, the first thing you have to know is that there needs to be a plan in order for me to start development on a fresh project. Most of the time I can come up with a plan if it's only me working on something, but usually when there's a team involved, planning is a step that either I would be involved in, or it has come from the project leader/planner. In this instance, I'm the project manager managing a team of one - myself.

Generally my plans start out with the questions: "What are we trying to build?" , "What tools do we have to work with?", and "Who knows how to use these tools?". Knowing what we're building is a no-brainer. Don't start a project without a clear statement of work or you'll doom the project from the get-go. If we have no tools, we go find some tools. If we have tools with no expertise, there has to be some training involved, or we have to find the talent. I'm usually that talent when it comes to code-stuff. On an established team with an established development stack, this tool discussion is very quick, but one that still must happen even if it's, "The usual?" ... "Yup." Document it in the SoW, if only for posterity. This will help later if/when someone else needs to work on the system.

After that, it's prototyping time. Proof of concept. Prove to me that the concept of the project is viable in our business model in a somewhat basic capacity. Typically this is done either in conjuction with the planning process or shortly afterward, and usually consists of a small, focused team of skilled individuals. This is done to obviously work out some bugs, but if you're able to dive into the problem a little bit during the planning process, the development team can probably dig up enough information to keep the project as a whole on the fast track. Build for the future. Expect this code to change; don't get too attached to it. In our example, that focused team is, well, me, and I won't be able to do parallel planning/development, so a little efficiency lost there. No big deal, really.

Next up: prototype testing. Try to make the logic bullet proof. Catch the obvious bugs. Polish it into something you can demo for a subject matter expert. Document it. Compare to SoW to determine if you're done. Receive feedback. Repeat until there's a working prototype.

Next is the interactivity portion. Now that you have the data and how it behaves, build out how the user will interact with it. Some say function follows form, some say form follows function - I say forget all that and put yourself in the user's shoes. If it's hard to use, they won't use it at all, or you'll constantly be bombarded with unnecessary troubleshooting and/or complaints; build accordingly. If on a team, have the design discussion. How should it look? How should it function? Count the clicks to get something done. The more clicks to do regular tasks, the worse your feedback is going to be. Let someone alpha/beta test it for you if you have the manpower. In this case, I guess you guys are my alpha testers!

Finally, you have changes. This scenario has happend on literally every project I've ever worked on. Someone on the team has a better idea (which could be you). The client adds some feature list to the project. The project leader doesn't want it to work some way or other. We find some sort of rule or statute that we have to follow that changes everything. Some of this can happens when delivery is expected in the last 25% of the project lifecycle. Usually a statement of work will include feature addition cutoff time, or even what features are in scope, but a lot of people and companies I've worked with leaves this clause out to maintain customer relations and customer satisfaction. In this case, we'll be experiencing an additional feature request. The client came to us and stated that the price breaks will be combined with limited time deals, percent off of entire order size and perhaps, one day, combo deals. The logic change is: if a sale is going on, they will get both the price break discount as well as the deal.

The plan:
1. Go through the Git and AnguarJS documentation and examples. Learn them to the best of my ability for short term development and deployment.
2. Get a functioning prototype working for the processing of the normal static table using a PHP object of some kind from the command line.
3. Write tests for the object to make sure it does, indeed, function properly. I'll use the tests they mentioned in the documentation to make sure it works from the command line.
4. Get a GUI working in conjunction with the object.
5. Maintain, improve, and iterate - feature request - split the table up into logical sections - items, price breaks, sales. Give date ranges for multiple sales and/or price breaks, because that's usually how the real world works when it comes to retail.
6. Integrate the new database structure into object. For giggles, let's keep backwards compatability with the old object using a view of some kind.



