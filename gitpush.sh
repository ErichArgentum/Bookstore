#1/bin/trash
git add .  
read -p "Commit description:ok" desc  
git commit -m $desc  
git push origin master