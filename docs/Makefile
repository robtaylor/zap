# Make file for Zap documentation
# (c) James Aylett <dj@zap.uk.eu.org>

chapters 	= $(wildcard src/Chapter*,fff)
appendices	= $(wildcard src/Appendix*,fff)
controlfiles	= $(wildcard src/Manual*,fff)

buttress	= $(HOME)/projects/tartarus/buttress/build/buttress
butt_options	=

# We need rm, but it's almost always the same. You may need to change
# this on dubious Unixoids so we're using GNU rm instead of the vendor
# one.
rm		= rm -f

# Final target:
zapdocs:		manual

debug:		$(chapters) $(appendices) $(controlfiles)
		$(buttress) -d $(butt_options) $(chapters) $(appendices) $(controlfiles)

manual:		$(chapters) $(appendices) $(controlfiles)
		$(buttress) $(butt_options) $(chapters) $(appendices) $(controlfiles)

clean:
		$(rm) *.html output.txt