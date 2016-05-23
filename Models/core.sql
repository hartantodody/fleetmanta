SELECT
ROUND(1000 * 111.1111 *
    DEGREES(ACOS(COS(RADIANS(a.orilat))
         * COS(RADIANS(a.destlat))
         * COS(RADIANS(a.orilong - a.destlong))
         + SIN(RADIANS(a.orilat))
         * SIN(RADIANS(a.destlat)))),2) AS distance_in_km
  FROM orders a
  ORDER BY distance_in_km


  SELECT *, ROUND(1000 * 111.1111 *
      DEGREES(ACOS(COS(RADIANS(o.orilat))
           * COS(RADIANS(o.destlat))
           * COS(RADIANS(o.orilong - o.destlong))
           + SIN(RADIANS(o.orilat))
           * SIN(RADIANS(o.destlat)))),2) AS distance_in_m FROM `reports_has_orders` r
  join `orders` o on r.orders_ordersid = o.orderid
  WHERE reports_reportsid = 1

  SELECT o.orderid, o.containers_containerid, o.quantity, t.description, ROUND(1000 * 111.1111 *
    DEGREES(ACOS(COS(RADIANS(o.orilat))
         * COS(RADIANS(o.destlat))
         * COS(RADIANS(o.orilong - o.destlong))
         + SIN(RADIANS(o.orilat))
         * SIN(RADIANS(o.destlat)))),2) AS distance_in_m FROM `reports_has_orders` r
join `orders` o on r.orders_ordersid = o.orderid
join `trips` t on o.trips_tripsid = t.idtrips
WHERE reports_reportsid = 1
