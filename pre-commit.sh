#!/bin/bash

composer check-format
CS_FIXER_EXIT_CODE=$?

if [ $CS_FIXER_EXIT_CODE -ne 0 ]
then
	composer format
fi


if [ $CS_FIXER_EXIT_CODE -ne 0 ]
then
	exit -1
fi
