import cv2 as cv
import numpy as np
import sys
import mysql.connector
from mysql.connector import errorcode
from matplotlib import pyplot as plt
from imutils.object_detection import non_max_suppression
from pyzbar.pyzbar import decode


id = sys.argv[2]
prova = sys.argv[1]
path = 'C:/Users/Gabriel/Documents/breeze/lastchance/storage/app\public/provas/'
img = f"{path}/{prova}"

# print(prova)


photo = cv.imread(img)



try:
	db_connection = mysql.connector.connect(host='localhost', user='root', password='', database='gabaritei')
	# print("Database connection made!")
    
except mysql.connector.Error as error:
	if error.errno == errorcode.ER_BAD_DB_ERROR:
		print("Database doesn't exist")
	elif error.errno == errorcode.ER_ACCESS_DENIED_ERROR:
		print("User name or password is wrong")
	else:
		print(error)
else:
	db_connection.close()


db_connection.reconnect()
cursor = db_connection.cursor()
sql = f"SELECT respostas FROM gabaritos WHERE id={id}"
cursor.execute(sql)


respostas = cursor.fetchone()

respostas = str(respostas[0])
respostas = respostas.replace('b', '')
respostas = respostas.replace('[', '')
respostas = respostas.replace(']', '')
respostas = respostas.replace('"', '')
respostas = respostas.replace("'", '')
respostas = respostas.split(',')
respostas = list(respostas)



cursor.close()
db_connection.close()


answers = respostas

def BarcodeReader(image):
    
  img = cv.imread(image)

  detectedBarcodes = decode(img)

  if not detectedBarcodes:
      print("No barcode detected")
  else:
      for barcode in detectedBarcodes:
          (x, y, w, h) = barcode.rect
          cv.rectangle(img, (x-10, y-10), (x+w+10, y+h+10), (0, 0, 255), 2)
          if barcode.data!="":
              barcodeData = barcode.data.decode("utf-8")
              barcodeData = barcodeData.replace('A', '')
              return barcodeData


barcode = BarcodeReader(img)


template = cv.imread('C:/Users/Gabriel/Documents/breeze/lastchance/public/python/photos/fiducial.png')
template2 = cv.imread('C:/Users/Gabriel/Documents/breeze/lastchance/public/python/photos/fiducial2.png')
template3 = cv.imread('C:/Users/Gabriel/Documents/breeze/lastchance/public/python/photos/fiducial3.png')
template4 = cv.imread('C:/Users/Gabriel/Documents/breeze/lastchance/public/python/photos/fiducial4.png')


marked = cv.imread('C:/Users/Gabriel/Documents/breeze/lastchance/public/python/photos/marked.png')
square = cv.imread('C:/Users/Gabriel/Documents/breeze/lastchance/public/python/photos/square.png')

blurred = cv.GaussianBlur(photo, (5, 5), 0)

# cv.imshow('photo', photo)


result = cv.matchTemplate(photo, template, cv.TM_CCOEFF_NORMED)
(minVal, maxVal, minLoc, maxLoc) = cv.minMaxLoc(result)

(startX, startY) = maxLoc

endX = startX + template.shape[1]
endY = startY + template.shape[0]

cv.rectangle(photo, (startX, startY), (endX, endY), (0, 255, 0), 2)



beginX = endX
beginY = endY

result = cv.matchTemplate(photo, template2, cv.TM_CCOEFF_NORMED)
(minVal, maxVal, minLoc, maxLoc) = cv.minMaxLoc(result)

(startX, startY) = maxLoc

endX = startX + template.shape[1]
endY = startY + template.shape[0]

cv.rectangle(photo, (startX, startY), (endX, endY), (0, 255, 0), 2)

result = cv.matchTemplate(photo, template3, cv.TM_CCOEFF_NORMED)
(minVal, maxVal, minLoc, maxLoc) = cv.minMaxLoc(result)

(startX, startY) = maxLoc

endX = startX + template.shape[1]
endY = startY + template.shape[0]

cv.rectangle(photo, (startX, startY), (endX, endY), (0, 255, 0), 2)


tableEndX = startX
tableEndY = startY

result = cv.matchTemplate(photo, template4, cv.TM_CCOEFF_NORMED)
(minVal, maxVal, minLoc, maxLoc) = cv.minMaxLoc(result)

(startX, startY) = maxLoc

endX = startX + template.shape[1]
endY = startY + template.shape[0]

cv.rectangle(photo, (startX, startY), (endX, endY), (0, 255, 0), 2)


# cv.imshow('photo', photo)

# photo_rz = cv.resize(photo, (0, 0), fx=0.3, fy=0.3)
# cv.imshow('Output_rz', photo_rz)


cropped = photo[beginY:tableEndY, beginX:tableEndX]

# cv.imshow('cropped', cropped)
blur = cv.blur(cropped, (3, 3))


W, H = square.shape[:2]
  
# Define a minimum threshold
thresh = 0.53
  
# Converting them to grayscale
img_gray = cv.cvtColor(blur, 
                        cv.COLOR_BGR2GRAY)
temp_gray = cv.cvtColor(square,
                         cv.COLOR_BGR2GRAY)
  
# Passing the image to matchTemplate method
match = cv.matchTemplate(
    image=img_gray, templ=temp_gray, 
  method=cv.TM_CCOEFF_NORMED)
  
# Select rectangles with
# confidence greater than threshold
(y_points, x_points) = np.where(match >= thresh)
  
# initialize our list of rectangles
boxes = list()
  
# loop over the starting (x, y)-coordinates again
for (x, y) in zip(x_points, y_points):
    
    # update our list of rectangles
    boxes.append((x, y, x + W, y + H))
  
# apply non-maxima suppression to the rectangles
# this will create a single bounding box
boxes = non_max_suppression(np.array(boxes))


menorX = 9999999
menorY = 9999999
maiorX = 0
maiorY = 0
  
# loop over the final bounding boxes
for (x1, y1, x2, y2) in boxes:

    # print(x1, y1, x2, y2)
    
    if y1 < menorY:
      menorY = y1
    
    if x1 < menorX:
      menorX = x1
    

    if y2 > maiorY:
      maiorY = y2

    if x2 > maiorX:
      maiorX = x2

    # draw the bounding box on the image


    #y1 = 42 ou 43 primeira linha

    #cada questao tem diferença de 17 px no eixo y

    #coluna 1 : x1 < 200
    #coluna 2 : x1 > 200 and x1 < 500
    #coluna 3 : x1 > 500


    

    if  x1 < 200:
      cv.rectangle(cropped, (x1, y1), (x2, y2), (0, 255, 255), 2)
      # print("coluna 1")
      # print(x1, y1, x2, y2)
    elif x1 > 200 and x1 < 500:
      cv.rectangle(cropped, (x1, y1), (x2, y2), (0, 255, 0), 2)

      # print("coluna 2")
      # print(x1, y1, x2, y2)
    else:
      cv.rectangle(cropped, (x1, y1), (x2, y2), (255, 0, 0), 2)
      # print("coluna 3")
      # print(x1, y1, x2, y2)



# cv.rectangle(cropped, (60, 40), (210, 580), (255, 0, 255), 2)

# cv.rectangle(cropped, (273, 40), (422, 580), (255, 255, 0), 2)

# cv.rectangle(cropped, (485, 40), (635, 580), (0, 255, 255), 2)


W, H = marked.shape[:2]
  
# Define a minimum threshold
thresh = 0.84
  
# Converting them to grayscale
img_gray = cv.cvtColor(blur, 
                        cv.COLOR_BGR2GRAY)
temp_gray = cv.cvtColor(marked,
                         cv.COLOR_BGR2GRAY)
  
# Passing the image to matchTemplate method
match = cv.matchTemplate(
    image=img_gray, templ=temp_gray, 
  method=cv.TM_CCOEFF_NORMED)
  
# Select rectangles with
# confidence greater than threshold
(y_points, x_points) = np.where(match >= thresh)
  
# initialize our list of rectangles
boxes_marked = list()
  
# loop over the starting (x, y)-coordinates again
for (x, y) in zip(x_points, y_points):
    
    # update our list of rectangles
    boxes_marked.append((x, y, x + W, y + H))
  
# apply non-maxima suppression to the rectangles
# this will create a single bounding box
boxes_marked = non_max_suppression(np.array(boxes_marked))


newList = boxes_marked[::-1]

coluna1 = list()
coluna2 = list()
coluna3 = list()


#coluna 1

# A = x1 = 80; x2 = 98
# B = x1 = 103; x2 = 121
# C = x1 = 133; x2 = 151
# D = x1 = 158; x2 = 176
# E = x1 = 184; x2 = 202

#coluna 2

# A = x1 = 289; x2 = 307
# B = x1 = 316; x2 = 334
# C = x1 = 342; x2 = 360
# D = x1 = 369; x2 = 387
# E = x1 = 395; x2 = 413

#coluna 3

# A = x1 = 507; x2 = 525
# B = x1 = 533; x2 = 551
# C = x1 = 558; x2 = 576
# D = x1 = 585; x2 = 603
# E = x1 = 611; x2 = 629
def checkAlternative(x1, x2, col):

  # print(x1,x2, col)

  if col == "coluna1":
    if x1 > 70 and x2 < 110:
      return "A"
    elif x1 > 90 and x2 < 140:
      return "B"
    elif x1 > 130 and x2 < 160:
      return "C"
    elif x1 > 150 and x2 < 190:
      return "D"
    elif x1 > 180 and x2 < 230:
      return "E"
  elif col == "coluna2":
    if x1 > 280 and x2 < 320:
      return "A"
    elif x1 > 310 and x2 < 350:
      return "B"
    elif x1 > 340 and x2 < 375:
      return "C"
    elif x1 > 360 and x2 < 395:
      return "D"
    elif x1 > 380 and x2 < 500:
      return "E"
  elif col == "coluna3":
    if x1 > 500 and x2 < 540:
      return "A"
    elif x1 > 530 and x2 < 560:
      return "B"
    elif x1 > 550 and x2 < 590:
      return "C"
    elif x1 > 580 and x2 < 620:
      return "D"
    elif x1 > 600 and x2 < 650:
      return "E"
  else:
    return "X"

def concatenate_questions(id, col1, col2, col3):
  questions = list()
  questions.append(id)

  for i in range(0, len(col1)):
    questions.append(col1[i])

  for i in range(0, len(col2)):
    questions.append(col2[i])

  for i in range(0, len(col3)):
    questions.append(col3[i])


  return questions


lasty1_coluna1 = menorY - 27
lasty1_coluna2 = menorY - 27
lasty1_coluna3 = menorY - 27

# loop over the final bounding boxes
for (x1, y1, x2, y2) in newList:

  cv.rectangle(cropped, (x1, y1), (x2, y2), (0, 0, 255), 2)

  

  if  x1 < 200:
    # print("LAST Y1 COLUNA 1: ", lasty1_coluna1)
    # print(x1, y1, x2, y2)

    aux = abs(y1 - lasty1_coluna1)

    if aux >= 2:
      if(aux > 40):
        coluna1.append("X")
      coluna1.append(checkAlternative(x1, x2, "coluna1"))
    else:
      coluna1.pop()
      coluna1.append("X")
    lasty1_coluna1 = y1
  
  elif x1 > 200 and x1 < 500:


    aux = abs(y1 - lasty1_coluna2)
    # print("last y: ", lasty1_coluna2)

    if aux >= 2:

      if(aux > 40):
        coluna2.append("X")
      coluna2.append(checkAlternative(x1, x2, "coluna2"))
    else:
      coluna2.pop()
      coluna2.append("X")
    lasty1_coluna2 = y1
    # print(x1, y1, x2, y2)

  elif x1 > 500:

    aux = abs(y1 - lasty1_coluna3)
    # print("AUX: ", aux)
    # print("last y: ", lasty1_coluna3)


    if aux >= 2:

      if(aux > 40):
        coluna3.append("X")

      coluna3.append(checkAlternative(x1, x2, "coluna3"))
    else:
      coluna3.pop()
      coluna3.append("X")


    lasty1_coluna3 = y1
    # print(x1, y1, x2, y2)


if lasty1_coluna1 < 530:
  coluna1.append("X")
if lasty1_coluna2 < 530:
  coluna2.append("X")
if lasty1_coluna3 < 530:
  coluna3.append("X")



for i in range(0, 20):

  cv.rectangle(cropped, (menorX-20, menorY-5), (menorX+130, menorY+20), (255, 0, 255), 1)
  menorY = menorY + 27


# cv.rectangle(cropped, (507, 43), (525, 68), (0, 0, 0), 2)
# cv.rectangle(cropped, (533, 43), (551, 68), (0, 0, 0), 2)
# cv.rectangle(cropped, (558, 43), (576, 68), (0, 0, 0), 2)
# cv.rectangle(cropped, (585, 43), (603, 68), (0, 0, 0), 2)
# cv.rectangle(cropped, (611, 43), (629, 68), (0, 0, 0), 2)

# print(coluna1)
# print(coluna2)
# print(coluna3)


# print(answers)

total = concatenate_questions(barcode, coluna1, coluna2, coluna3)
# print(total)

correcao = list()
count = 0

for i in range(0, len(answers)):

  if i == 0:
    correcao.append(total[i])
    continue
  if answers[i] == total[i]:
    correcao.append('V')
    count += 1
  else:
    correcao.append('X')

  # print(f'{i+1} {answers[i]}')


# cv.imshow("Template", marked)
# cv.imshow("After NMS", cropped)
print(correcao)
print(count)
print(barcode)
  
# # destroy all the windows 
# # manually to be on the safe side


# cv.waitKey(0)




