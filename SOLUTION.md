## Solutions **(Spoiler warning!)**
___________
___________
___________
___________


### Remember, your goals are...
* **Easy**: Find the name of a Sudo Auto Insurance customer
* **Medium**: Find the account number of a Sudo Auto Insurance customer
* **Hard**: Upload a web-based shell to the server


#### Part one: Social Media Exploitation
Start by browsing the site.
Notice that the only real option is to log in to the site.
Since we don't have a valid login, we can try to brute force or SQL inject the login form.
Neither will likely amount to any success.

Since we aren't able to log in, the best option may be to abuse the site's content.
The homepage lists a hashtag, #SudoAutoInsurance.
Take this hashtag to the home of the hashtags, Twitter.
Searching will reveal a tweet from a Sudo Auto Insurance customer.

Ralph, our target, reveals that he likely uses Sudo Auto's insurance claim submission site.
If we can get Ralph's credentials, we can access his personal data, or pivot to attack Sudo Auto.
Through Ralph's Twitter profile, we can access his LinkedIn profile.

Heading back to the Sudo Auto Insurance site, we can make use of the Reset Password form.
We see we need Ralph's email to start the process.
Luckily, Ralph's email is listed clearly on his LinkedIn profile...
Once we have that, we can move onto the security questions:

1. *What is the name of your first pet?* His tweets reveal the answer, Balvenie.
2. *What is the make of your first car?* In the #SudoAutoInsurance tweet, the picture shows a Jeep.
3. *What is the name of your first employer?* His LinkedIn profile reveals that he works at Olive Garden.

We've successfully reset Ralph's password to his birthday. As expected, that is easily found in his Tweets. Enter 11101994 with Ralph's email, which we found earlier.


#### Part two: Local File Inclusion
Now that we can log in, we can submit an insurance claim as Ralph.

Our goal is to upload a shell to the server. Your payload can be as simple as a php `system()` call, but a more complex, automagically-generated shell such as Weevely is recommended. Check out Weevely at https://github.com/epinna/weevely3.

We can enter whatever text we want, but it seems to be picky and require an actual image file.
It's safe to assume to that the server saves the images somewhere, but where?
If I was a server, where would I hide my dirty little secrets?

We can check `robots.txt` to see if there are any directories hidden from search engines.
Bingo! We see the `/collision-img` directory is hidden.
If we've already tried to submit a claim, we'll find all of our image uploads there.

Our next issue is, how do we upload something that's not an image?
Since we're receiving a browser alert box before any requests are sent, the filtering is definitely on the client side.
Using a browser's element inspector on the form (`#submissionForm`) we can see that there is no inline code to do this filtering.
However, searching the assets for `#submissionForm`, we see that the downloaded copy of bootstrap.js has an event handler on line 747.
Remove the event handler however you see fit. For the lazy, entering the following into the console will work:
* `document.getElementById('submissionForm').onsubmit = function(){};`

Uh-oh - more filtering. We're through the client-side filtering, but uploading anything that isn't an image seems to return us to the form with a URL addition: `?hack=detected`.
Maybe we can trick the server into thinking we've uploaded a PHP file.
The server is checking for the string `.jpg` or `.png` in the name of the uploaded file.
So we can rename our malicious upload, changing the extension to `.jpg.php`.

We can now upload the file, allowing us to run shell commands as the web-server's user.
