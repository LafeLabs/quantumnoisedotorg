# [www.quantumnoise.org](https://www.quantumnoise.org)
# [github](https://github.com/LafeLabs/quantumnoisedotorg)

# The Quantum Noise Synth(QNS)

Rules of QNS:

 1. Everything is a [guitar pedal](https://en.wikipedia.org/wiki/Effects_unit)
 2. Everything is [public domain](https://en.wikipedia.org/wiki/Public_domain)
 3. Everything lives in a [web browser](https://en.wikipedia.org/wiki/Web_browser)

## What is QNS?


The heart of the QNS is the quantum tunnel junction, a device made up of two pieces of aluminum separated by a thin insulating barrier.  This insulating barrier is made from aluminum oxide, and we grow the junctions by evaporating one layer of aluminum on top of another, with just a spritz of oxygen in between to form the thin barrier.  This tunnel barrier is about a nanometer thick, or a few thousanths of the wavelength of light.  Classically, this barrier should be an impenetrable wall for electrons, but quantum mechanically, electrons behave like waves which can "tunnel" through barriers.  So when we apply a voltage to the device, a current flows.  This current is made up of many tiny pulses of current which correspond to the electron tunneling events.  These pulses add up like the sound of rain on a roof to a white noise signal with many GHz of bandwidth.  

When we apply an audio signal to the quantum tunnel junction, it changes the volume of tunneling events, modulating the high bandwidth hissing white noise signal.  If we cool down the device to 1/100th of a degree above absolute zero using a dilution refrigerator, the corresponding noise lowers with the temperature.  At this temperature, the tunneling events are mostly caused by quantum fluctuations of the vacuum rather than thermal energy.  This transition from thermal to quantum fluctuations can be used to calibrate the audio signals directly at the junction which in turn can calibrate the levels of white noise being sent out from the junction to some kind of quantum circuit like a quantum amplifier.  This can be used to determine the added noise and gain of quantum amplifiers, as well as the temperature of the electrons in a circuit.  


Quantum amplifiers of this type are critical for both the readout of superconducting quantum computers and for dark matter searches, as well as fundamental quantum studies.  As quantum computing systems scale up, they will need more and more quantum amplifiers, increasing the demand for accurate metrology on those amplifiers.  The QNS project seeks to distribute free QNS devices to all the labs of the world who can make use of such a thing.  We are building the whole system as a piece of self-replicating media, a set of web pages which describe how to copy the whole system.  

This web page is a part of a set of self-replicating documents including PHP scripts, HTML files, JavaScript libraries, CSS styles, and markdown and JSON files which copy themselves along with whatever the set of documents points to.  The page includes how to send material support to the creator of the technology so that the work can be freely distributed.  Money sent to me will go to support buying enclosures from a machine shop, buying circuit boards from a board shop, buying connectors and adapters in bulk, paying people to get trained and go spread the technology, and microfabrication costs. 


## Signal Path

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/whole-system-schematic.svg)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/warm-qns.svg)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/classical-response.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/quantum-response.png)


Audio signals go through a series of audio bandpass filters down into a dilution refrigerator, and then bias a tunnel junction, which produces RF(GHz) noise, which gets amplified, filtered, mixed back down into the audio, and filtered again, then out via an SMA which is converted to audio cables.

## Audio tone generation

We can generate tones from any web enabled device by using the [p5js JavaScript Library](https://p5js.org).  This is a library designed for artists, which has built in libraries for making and analyzing sounds which we will use in the QNS system.

1. [Simple tone generator](playtone.html)
2. [Amplitude ramp generator](playramp.html)
3. [Frequency sweep generator](playsweep.html)
5. [Noise generator](noiseband.html)
4. [Read the response spectra](https://quantumnoise.org/QNS-spectra.html)
5. [link to p5js scroll](scrolls/p5js)

## QNS Capsule Design

Every stage in the above system, both warm and cold, is the same design of both the capsule and the printed circuit board which goes inside the capsule.  Only the component values and locations change from one stage to the next. 

Machine these out of brass or gold plated OFHC copper.

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/universal-box-frontview.svg)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/universal-box-sideview.svg)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/universal-box-topview.svg)

This design is used for all elements of the system.  

The M4 through hole is for mounting on the various plates of a [Bluefors](https://bluefors.com/) dilution refrigerator.  The diameter should be 4.5 mm for a medium fit.  Threaded holes in the corners are M2 threads for the lid screws. 

The lid is slightly smaller than the body of the capsule so that the edges never interfere with the flush contact of the body with the mounting plate.  

Should the lid or body have some kind of holes to make sure that gas can get removed easily?  Design options here must be explored.  

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/lid-drawing.svg)

Also, a threaded hole in the lid could be used as a tuner with an insulating screw.  

[link to M2 brass screws on mcmaster](https://www.mcmaster.com/96741A013/)

[link to M4 fancy brass screw](https://www.mcmaster.com/90349A114/)

[link to cheaper M4's out of stainless](https://www.mcmaster.com/91292A122/)

[color coded pink 3 mm hex wrench, L with ball end](https://www.mcmaster.com/2617n28/)

## QNS printed circuit board(PCB)

Standard FR4 circuit boards are about 1.6 mm in thickness, and have a dielectric constant of about 3.8-4.8.  We want a 3 mm wide center line, which gives a gap of about 300 microns to be 50 ohms.  

[Microwaves101.com coplanar waveguide calculator](https://www.microwaves101.com/calculators/864-coplanar-waveguide-calculator)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/universal-pcb.svg)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/pcb-launch-photo2.png

This is a .svg which has the exact dimensions of the copper and board outlines, in separate layers:

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/pcbdrawing.svg)

 - [qns-v1.sch](https://github.com/LafeLabs/quantumnoisedotorg/raw/master/pcblayout/CAMOutputs/GerberFiles/qns-v1.sch)
 - [qns-v1.brd](https://github.com/LafeLabs/quantumnoisedotorg/raw/master/pcblayout/CAMOutputs/GerberFiles/qns-v1.brd)
 - [link to zip of gerber files](https://github.com/LafeLabs/quantumnoisedotorg/raw/master/pcblayout/CAMOutputs/GerberFiles/quantum-noise-synth-v1.zip)

Get these boards made with FR4, no soldermask, backside can be a ground plane or not, test both.

## SMA Board Launch connectors

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/sma-launch-pcb-screenshot.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/sma-launch.png)

## QNS Standard Filter

We use a filter which attenuates voltage by 10x, blocks DC, has a bias resistor to ground, and rolls off with several poles above a few kHz.  

Here is a schematic of this filter:

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/rcline-schematic.svg)

Here is a plot of calculated insertion loss of that filter:

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/filter-insertion-loss.png)

[link to the p5js app which created the plot](filter.html)

## QNS Tunnel Junction Bias Capsule

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/cold-box-schematic.svg)

The inductor is a [conical bias tee inductor](https://www.coilcraft.com/en-us/products/rf/conical-broadband/0-40-ghz/bcl/) of a few microhenries from [Coilcraft](https://www.coilcraft.com/).  The tunnel junction has a DC path to ground through the bias resistor, but no DC path to the outside world.  This should improve both thermalization and make it harder to destroy junctions by accident.  The bias applied from the input side causes fluctuations in the white noise generated by the junction, which goes through the RF amplifier chain to the QNS Downconversion capsule.

## QNS Downconversion Capsule

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/down-convert-capsule-schematic.svg)

A bandpass filter lets in only the RF band we are interested in.  This signal is rectified with a fast diode, and that rectified signal is put through another band pass in the audio range we are interested in, generally from a few hundred Hz through a few kHz.

There is a good chance that a better solution than making a special capsule is to use off the shelf packaged parts, including an RF bandpass  filter and a detector with an SMA connector like [this one from ebay for 30 dollars](https://www.ebay.com/itm/353594431694) or [this one from ebay](https://www.ebay.com/itm/266261361915). also bandpass filters [like this can be found on ebay](https://www.ebay.com/itm/125930411932). So we have a bandpass, followed by a RF detector, which should then get followed by a low pass like [this one from minicircuits](https://www.minicircuits.com/WebStore/dashboard.html?model=SLP-1.9%2B) and then a DC block, which can be a simple capsule which just filters the audio, rejecting DC with a capacitor and cutting the ultrasonic components way down.  So we have a COTS filter with SMA, a COTS detector with SMA, then a bandpass like all the other ones that gets rid of everything you can't hear and also the stuff below about 10  to 100 Hz.  

## Junction response Theory

 ![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/colth-sweep-freeze.png)

[Physics Simulator in p5js](fermi.html)

To analyze how signals are transformed by the QNS, we use a set of units normalized by fundamental constants and the system temperature, namely the normalized bias voltage indicated by a lowercase v, normalized frequency $\phi$ and normalized noise power in temperature units $p$:

$$
v \equiv \frac{eV}{kT}
$$

$$
\phi \equiv \frac{hf}{kT}
$$

$$
p \equiv \frac{P}{4kB},
$$

where k is the Boltzmann constant now fixed by the quantum SI to be $1.380649\times10^{-23} J/K$, e is the elementary charge, now fixed by the quantum SI to be $1.602176634 \times 10^{-19}C$, B is the effective bandwidth of the noise power measurement in hertz, f is the frequency in hertz at which noise is measured, T is the absolute temperature in kelvin, and P is the power in watts.  The normalized expression for the noise power response p as a function of v for fixed $\phi$ is as follows:

$$
p = T\left( \frac{v + \phi}{4}\right)\coth{\left( \frac{v + \phi}{2}\right)} + T\left( \frac{v - \phi}{4}\right)\coth{\left( \frac{v - \phi}{2}\right)},
$$

which reduces to 

$$
p = T
$$

for $v = 0$ and $\phi = 0$ and 

$$
p = T\left(\frac{v}{2}\right)\coth{\left(\frac{v}{2}\right)}.
$$
for $\phi = 0$, and 

$$
p = T\left(\frac{\phi}{2}\right)\coth{\left(\frac{\phi}{2}\right)}.
$$
for $v = 0$.

The full expression for p as a function of v with $\phi>>1$ shows the flat-bottomed v curve below:

![theoretical quantum noise curve with no units](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/coth-frontpage.png)

The bias we apply to this is a linear ramped sine wave which looks like this:

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/stimulus.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/inarrow.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/in-out-capsule.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/outarrow.png)


![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/response.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/classical-response.png)

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/quantum-response.png)

[ramp plotter](ramp2.html)

The response to the ramped stimulus is shown above.  As long as the peak value of the AC bias wave is below the quantum knee at $v = \phi$, there is almost no response, then the response suddenly turns on as that threshold is reached. This calibrates the time axis of the response curves using the value of that quantum frequency, which can be known quite accurately, hence calibrating the time axis in units of temperature.  Since the slope of the shot noise response is known, this also calibrates the vertical axis in units of temperature, which is the desired result for both noise and temperature metrology.  This calibration process is for the both the audio bias and RF response *directly across the junction*, so it removes both the attenuation going down to the junction and the gain going back up.

That is the magic of the QNS!  It takes audio signals as input, puts out audio signals as output, and calibrates out all of the various artifacts between the audio system and the quantum tunnel junction.  

To get a nice curve like the one showed above for a system with about 7 GHz noise power center frequency and 10 millikelvin physical temperature, we get a value of $\phi \approx 30$ and so we aim for a max value of v of about 60.  This is a voltage in SI units of 50 microvolts. So for typical audio signals we might have hundreds of millivolts at the top of the fridge and so want to attenuate about about a factor of ten to the fourth.  This will attenuate power by a factor of ten to the eighth. Hence we have four stages of the standard QNS filter which attenuates voltage by a factor of 10.


## The Quantum Guitar Pedal

How is it that this is a guitar pedal?  It is an analog circuit with a real time input and output, in the audio frequency range, and we always use connector adapters to make the whole system plugs directly into the signal path of a pedal board.

But at the end of the day what makes it a guitar pedal is that we will actually put this in the signal chain of an active music setup. This is intended to be a fully playable apparatus.  And part of that is building the *social* network required to get the right sort of experimental musicians to show up and try this out.  Ideally we can find the overlap of riff magicians, pedal nerds, modular synth weirdos, and general eccentrics who can see the artistic appeal of playing the quantum noise as an instrument.

## QNS Distribution

We will provide all parts of this system for free to anyone who can make good use of them.  We will raise funds to support this project, separate from the user base.  Users might put into the crowd fund, but they are not "buying" the individual units.  Users get the unit that is most appropriate for their application, whatever that may be. 

Our objective is to bring this technology, for free, to anyone anywhere in the world who can make use of it.  This means "free like freedom" in the sense that all work is Public Domain and fully documented online, as well as "free like beer" in that users do not need to put any money in to join the network.  It is also "free like food not bombs" in the sense that we are looking to invite people in to the network of users with as little barriers as possible.  We aim in particular to create network linkages between music and art networks and physics and technology networks, so that musicians and artists can easily collaborate to connect their work with live QNS instances.

We also will create a room temperature version which can run anywhere, and in which the junction noise is calibrated using the known physical temperature and some calibration standards.  

## The QNS Junction Fabrication

We will need to find or create a user facility which can allow all parties use of the system, which can do the deposition of metals to make the junction as well as the lithography required for the fabrication.

Junctions will use the Dolan Bridge angle evaporation technique. We need to drive the aluminum normal using manganese doping so that a permanent magnet is not needed to drive the aluminum normal.  No one who cares about qubits at all wants manganese anywhere near their evaporator, but they are typically the only people who have carefully calibrated systems for fabricating tunnel junctions(we need an angle stage, repeatable oxidation, and reasonably well calibrated film thickness sensors).  So what will probably be needed is installing a dedicated system for these types of junctions.  

Such a system can then supply a wide range of normal aluminum tunnel junctions to a wide range of experiments, at least in theory. And we need it set up to deposit both copper and gold. The designs presented here need gold contacts for the flip chip configuration to avoid wire bonding, and in order to avoid the dreaded "purple plague" we need copper between the aluminum and gold.  Copper and gold are both deposited as thick as we can get away with to maximize both electrical and thermal conductivity.  

This facility should be in a place that can allow people from anywhere to get access, even if it's just for a single deposition.  This is possible in a number of university clean rooms, but we will probably want to site it at the University of Colorado Boulder EE department since I can get there on the bus and have worked in that facility before.  

The layout of the chip is as simple as we can make it.  We make it as small and simple as possible rather than attempting to match to a transmission line impedance.  The purple lines in the following cartoon are only there to guide the eye and show how the symmetry works.  

![](https://raw.githubusercontent.com/LafeLabs/quantumnoisedotorg/master/trashmagic/die-layout.svg)

The exact dimensions will require some experimentation, and will partly depend on limitations of available dicing technologies.  How small a die can we make? That will depend on the tool we use. It might make sense to use an outsourced laser dicing process, but this will have to be researched as part of the overall fabrication research.


## The QNS Junction Packaging

We aim to make a flip chip geometry where some kind of spring mechanism pushes the chip against gold plated leads, with gold-on-gold contact.  There are a number of possible ways to do this.  This is also a subject which must be actively researched, and a number of options tried.  

## Quantum Philosophy

Is the quantum tunnel junction "interesting" from the standpoint of studying the philosophy of quantum mechanics?  Maybe.  There are a few aspects of this that are potentially interesting. 

 First of all, the shot noise from a tunnel junction is a demonstration of wave-particle duality.  Without the wave nature of the electron, there would be not tunneling, and without the particle nature it would have no shot noise, and the numerical value of that noise is determined by the quantum of charge e.  Can this be seen as a sort of wave function "collapse"?  What does that mean? I have no idea. But perhaps having more people looking at it and thinking about it will bring some ideas to light about what it means.

Also, what does it mean to play out the sound of the vacuum?  Surely a hiss is just a hiss. We can't tell white noise coming from one source from any other.  But perhaps people will find some value in the fact that they can directly interact with this very weird and very fundamental kind of fluctuation. These fluctuations are what are there when nothing else is.  Is that interesting philosophically?  

My hope is that all this will turn out to be interesting not so much in terms of what physicists have called "fundamental" for the last 100 or so years, but in terms of how people are able to personally, physically and mentally relate to quantum systems.  I believe that there is value in building a room temperature system which can be demonstrated for a few bucks' worth of materials and played by musicians with zero technical background.  I believe that value is of a philosophical nature.

## Applications

 - Determining the SI kelvin at temperatures below 1 kelvin according to the quantum redefinition of the kelvin
 - Improving calibration of amplifiers for dark matter searches
 - Improving in-house calibrations for amplifier-making labs in large companies, government labs and academia
 - Thermometer calibration apparatus for calibrating secondary thermometers
 - Analog quantum information processing with arbitrary quantum circuits
 - Making epic gnarly riffs like no one has ever made before using the quantum structure of reality
 - Method of fast and efficient probes of arbitrary electronic devices(including the tunnel junctions)
 - Street quantum demo, busking with quantum with the trash magic crew

## Trash Magic

Trash magic is a philosophy based on the idea of making self-replicating media from trash.  It is also a collection of technologies which make this possible using self-replicating code which runs in a web browser. 

## Geometron

Geometron is a geometric programming language which was used to generate the graphics, designs and layouts in this work.  


## How to support

You can support the purchasing of prototype materials by paying money to Upcycle Robotics, LLC over Venmo with the following link:

[Upcycle Robotics LLC Venmo](https://venmo.com/u/upcyclerobotics)

Upcycle Robotics is a 1 person Colorado LLC owned by Lafe Spietz, the creator of the QNS.  All payments are donations to support the creation of the art, not payments for goods, which are dispensed for free based on people's need and ability to use the materials.  

## Who am I?

I am Lafe Spietz.  I got my PhD from [Rob Schoelkopf](https://en.wikipedia.org/wiki/Robert_J._Schoelkopf)'s [lab](https://rsl.yale.edu/) in 2006, and was the creator of the Shot Noise Thermometer, which was the title of [my dissertation](https://lafelabs.github.io/sixbynine.pdf).  Since then I have worked with quantum amplifiers and quantum noise sources at [NIST](https://en.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology) [Boulder](https://en.wikipedia.org/wiki/Boulder,_Colorado), [KRISS](https://en.wikipedia.org/wiki/Korea_Research_Institute_of_Standards_and_Science), [IBM](https://en.wikipedia.org/wiki/IBM), Brooklyn Quantum Works, [JHU/APL](https://en.wikipedia.org/wiki/Applied_Physics_Laboratory), [Université de Sherbrooke](https://en.wikipedia.org/wiki/Universit%C3%A9_de_Sherbrooke), [Princeton](https://en.wikipedia.org/wiki/Princeton_University), [Dartmouth](https://en.wikipedia.org/wiki/Dartmouth_College) and [Berkeley](https://en.wikipedia.org/wiki/University_of_California,_Berkeley).  My undergrad was a double major in math and physics at Berkeley, which I graduated from in 1998.  I worked as a technician for a year at Berkeley in the [Zettl](https://en.wikipedia.org/wiki/Alex_Zettl) group  and then at Yale for a year in the Schoelkopf group, as a technician helping to build and buy all the stuff to build the new lab, as Rob had just been hired. After Yale I went to NIST Boulder to work in Joe Aumentado's group, where I worked on adapting the SQUID the detector group there had built for use as a microwave amplifier for quantum systems.  That group is now one of the leading groups in the world in quantum amplifier development as well as the main source world wide of the quantum tunnel junctions at this time.  

After leaving NIST, I worked on amplifiers of a different sort using electromechanical devices, starting a company called "Boulder Applied Physics" which manufactured devices in Denver Colorado which we shipped all over the world.  That company generated a few hundred k in revenue over the three years we operated.  At the same time, I was co-founder of a quantum startup called Brooklyn Quantum Works, and the full story of that will not be told here.  Those were strange times.  All those companies ended, and I ended up in the DC area as a beltway bandit, doing things I cannot talk about at JHU/APL.  The best work I did there was all as part of the high school intern program(because we could do this outside the conventional funding system), and working with the amazingly talented young people in that program, I worked on building various robotics and measurement devices from trash.  I spun this up into a whole Tiktok brand, and at one point TRASH ROBOT had over 47k followers, until the account was banned for talking about weed(not my weed).  

I am also the creator of the Trash Magic philosophy, language, JavaScript libraries, and web design frameworks, as well as the [Trash Magic Manifesto and action coloring book](https://lafelabs.github.io/Trash_Magic_Manifesto.pdf).  I wrote the language Geometron and two books about it, both of which can be found at [www.trashrobot.org](https://www.trashrobot.org).  Much of my work is based on the philosophy of [judo](https://en.wikipedia.org/wiki/Judo), and I have been a judoka off and on for over 25 years, and am a [shodan](https://en.wikipedia.org/wiki/Shodan_(rank)) in that system. I have also studied other several other martial arts including karate, taewondo, BJJ, traditional Chinese martial arts, and Filipino knife and stick fighting, and consider myself to be a life long martial artists even though at the moment long psychogeographic wanderings of the city are my only martial art.


I am back in Denver now, working as a lab technician for whoever wants to hire me and raising money into this anarchist art project.  


