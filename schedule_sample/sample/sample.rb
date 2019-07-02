def if_test(num)
  if num > 100 then
    print("100 < num\n")
  elsif num > 50 then
    print("50 < num <= 100\n")
  elsif num > 0 then
    print("0 < num <= 50\n")
  elsif num == 0 then
    print("num == 0\n")
  else
    print("num < 0\n")
  end
end

if_test(1000)
# 100 < num

if_test(70)
# 50 < num <= 100

if_test(0)
# num == 0

if_test(-100)
# num < 0
