@echo off
:1
heroku git:remote -a hackerclicker
git add .
git commit -am "make it better"
git push heroku master
PAUSE
goto 1