# Currency Converter
## tl;dr
I did use symfony so I can show of that I can use it :)

## Thoughts
I have to admit that a major problem for this test was what I really should do.
imho there are at minimum 3 ways to accomplish this task:

1. A JS implementation that relies on some existing API would be well enough. But you wrote you want PHP.
2. Even the minimum version of symfony weights too much for this. I could just write a single php file and use GET
parameters and it's done. Even adding a connection to some other API that gives us the current rates would be enough.
But I decided not to do it because it maybe KISS but not the object of the test.
3. Use existing tools and get done with it. There already is an currency conversion project with a symfony bridge.
https://github.com/florianv/symfony-swap This together with FOS Rest would be probably a good choice if I already had
an application and had to integrate it there.

### What I choose to do
So in the end I choose a way between. Still use symfony so I can use it's routing and some classes. In the frontend
I didn't use much because I feel you want to see if I can create a backend service for this. The twig template is super
basic without any blocks and this is on purpose. 

I decided not to use the symfony form component because the demo seems too small for me and XSS protection or advanced
validation don't seem necessary.

All in all it is a simple approach in the end. I collect the given values in a value object put that into the conversion
service and let the service decide which conversion classes are called from the factory. I faked that and it is only
one that loads a local file for the values. I didn't want to install guzzle to really implement it. But by this
abstraction every found currency rate service could use a common or special backend for loading the rate.

I didn't spyed too much how florianv did implement this. imho he overdid it here and there. I guess he didn't have
somebody to review his code and talk about. He really tries hard to implement CLEAN OOP code. Well maybe I am overdoing
it as well -_-

### Tests
Sorry no tests. But well if you like to take a look at my codeception talk
https://docs.google.com/presentation/d/1G50zxjPdH-bwTemia96m9Uxct_j85tKj7qt-YfTe-hc/edit?usp=sharing
At least I believe I know something about tests ;)

### ISO 4217
The currency strings are from https://de.wikipedia.org/wiki/ISO_4217
This should be used in an abstraction so we can make sure the strings are correct. Currently I only use simple strings.
