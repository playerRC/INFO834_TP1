import redis

r = redis.Redis()

user = "test@gmail.fr"

max_calls_limit  = 10
time_period      = 600
total_user_calls = 0

if not(r.exists(user)):
    r.set(user, 1)
    r.expire(user, time_period)
    total_user_calls = 1
    text = user+" a effectué " +str(total_user_calls)+ " connexion(s) en 10 minutes"
    print(text)
else:
    r.incr(user)
    total_user_calls = int(r.get(user))
    if (total_user_calls > max_calls_limit) :
        print(user+ " a dépassé le nombre de connexions autorisé en 10 minutes !")
    else:
        text = user+" a effectué " +str(total_user_calls)+ " connexion(s) en 10 minutes"
        print(text)