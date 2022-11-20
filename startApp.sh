
echo "You're delete all docker secret now .........";
docker secret rm $(docker secret ls -q)

echo "if there're error,please ignore it since the docker secret container is empty now"

echo " "
read -p 'Database_PWD':  Password

rand=`echo $Password | docker secret create data -` 
echo $rand >data.txt
data=""
jsonData='{
        "user":"Alice",
        "pwd":"123",
        "host":"mysql_db",
        "database":"comp3335",
        "Role":"Admin",
        "default":"root",
        "default_pwd":"%s"
    }'
printf -v data "$jsonData"  $rand ;
echo "$data">temp.json
openssl rsautl -in temp.json -out ./src/conFig/sa.json  -pubin -inkey ./src/secure/server_PK.pem  -encrypt
rm -rf temp.json
docker-compose up;

