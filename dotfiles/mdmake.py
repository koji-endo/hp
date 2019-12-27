#!/usr/bin/env python
# -*- coding: utf-8 -*-
import json
import sys
import os
with open (sys.argv[1]) as f:
    jsl=json.load(f)
    outfile=sys.argv[2]
    thb="\`\`\`"
    for jse in jsl:
        os.system("echo {} >> {}".format(jsl[jse],outfile))
        os.system("echo {} >> {}".format(thb,outfile))
        os.system("cat {} >> {}".format(jse,outfile))
        os.system("echo {} >> {}".format(thb,outfile))
